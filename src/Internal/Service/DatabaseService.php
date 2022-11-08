<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Service;

use Bavix\Wallet\Internal\Exceptions\ExceptionInterface;
use Bavix\Wallet\Internal\Exceptions\TransactionFailedException;
use Bavix\Wallet\Internal\Exceptions\TransactionRollbackException;
use Illuminate\Database\RecordsNotFoundException;
use Throwable;

final class DatabaseService implements DatabaseServiceInterface
{
    public function __construct(
        private ConnectionServiceInterface $connectionService
    ) {
    }

    /**
     * @throws RecordsNotFoundException
     * @throws TransactionFailedException
     * @throws ExceptionInterface
     */
    public function transaction(callable $callback): mixed
    {
        try {
            $connection = $this->connectionService->get();
            if ($connection->transactionLevel() > 0) {
                return $callback();
            }

            $connection->beginTransaction();

            $result = $callback();

            if ($result === false || (is_countable($result) && count($result) === 0)) {
                $connection->rollBack();
                throw new TransactionRollbackException($result);
            }

            $connection->commit();
            return $result;
        } catch (TransactionRollbackException $rollbackException) {
            return $rollbackException->getResult();
        } catch (RecordsNotFoundException|ExceptionInterface $exception) {
            throw $exception;
        } catch (Throwable $throwable) {
            throw new TransactionFailedException(
                'Transaction failed. Message: ' . $throwable->getMessage(),
                ExceptionInterface::TRANSACTION_FAILED,
                $throwable
            );
        }
    }
}
