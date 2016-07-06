<?php
$content = "some text here";
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/myText.txt","wb");
fwrite($fp,$content);
fclose($fp);


use Drupal\Core\Database\Connection;

class classdb extends ControllerBase {

  protected $connection;

  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  public function queryExamples() {
    // db_query()
    $this->connection->insert('node')
      ->fields(array(
        'title' => 'Example',
        'uid' => 1,
        'created' => REQUEST_TIME,
      ))
      ->execute();

  }

}

$newdb = new classdb;
$newdb->queryExamples;

?>
