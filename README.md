# QueryBuilder [ARCHIVED - NOT MAINTAINED]

A PDO wrapper class for running database queries.

Supports: PHP 7 and above

## Usage

```php
<?php
// INITIALISE THE CLASS PASSING AN INSTANCE OF PDO
$query = new QueryBuilder($pdo);

// RUN A SELECT QUERY
$posts = $query->run(
  'SELECT id, title FROM blog where category = ?',
  [ 'php' ]
);

echo $posts[0]->title

// RUN AN INSERT STATEMENT
$posts = $query->alter(
  'INSERT INTO user ( email, name, phone ) VALUES ( ?, ?, ? )',
  ['joe@example.com', 'John Doe', 'xxxx-xxx-xxx']
);

// GET THE LAST INSERTED ID
echo $query->getLastInsertId();

// USING TRANSACTIONS
$query->beginTransaction();
try {
  $query->alter(/* PASS YOUR PARAMETERS */);

  $query->commit();
} catch($e) {
  $query->rollBack();
  error_log($e);
}
```
