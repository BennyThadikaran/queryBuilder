<?php

class QueryBuilder {

  protected $pdo;

  public function __construct(PDO $pdo)
  {
      $this->pdo = $pdo;
      $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  }

  public function beginTransaction()
  {
      return $this->pdo->beginTransaction();
  }

  public function commit()
  {
      return $this->pdo->commit();
  }

  public function rollBack()
  {
      return $this->pdo->rollBack();
  }

  public function getLastInsertId()
  {
      return $this->pdo->lastInsertId();
  }

  public function run(string $sql, array $params = NULL): array
  {
      $statement = $this->pdo->prepare($sql);

      $statement->execute($params);

      return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function alter(string $sql, array $params = NULL): bool
  {
      $statement = $this->pdo->prepare($sql);

      return $statement->execute($params);
  }
}
