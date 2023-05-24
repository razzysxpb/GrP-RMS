<?php
namespace central;
class DatabaseTable {
	private $pdo;
	private $table;
	private $primaryKey;
	private $entityClass;
	private $entityConstructor;

	public function __construct($pdo, $table, $primaryKey, $entityClass = 'stdclass', $entityConstructor = []) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
		$this->entityClass = $entityClass;
		$this->entityConstructor = $entityConstructor;
	}

	public function find($field, $value) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');

		$stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	public function findAll() {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
		$stmt->execute();

		return $stmt->fetchAll();
	}
	public function delete($id) {
		$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
		$criteria = [
			'id' => $id
		];
		$stmt->execute($criteria);
	}

	
	
	public function insert($record) {
		$keys = array_keys($record);

		$values = implode(', ', $keys);
		$valuesWithColon = implode(', :', $keys);

		$query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

		$stmt = $this->pdo->prepare($query);

		$stmt->execute($record);
}



public function save($record)
	{
		try {
			if (empty($record[$this->primaryKey])) {
				unset($record[$this->primaryKey]);
			}
			$this->insert($record);
		} catch (\Exception $e) {
			$this->update($record);
		}
	}

	public function update($record)
	{

		$query = 'UPDATE ' . $this->table . ' SET ';

		$parameters = [];
		foreach ($record as $key => $value) {
			$parameters[] = $key . ' = :' . $key;
		}

		$query .= implode(', ', $parameters);
		$query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';
		$record['primaryKey'] = $record[$this->primaryKey];

		$stmt = $this->pdo->prepare($query);

		$stmt->execute($record);
	}


	public function findGreater($field ,$value, $limit) {
		// Select * FROM job.job WHERE sysdate()<closingDate ORDER BY closingDate LIMIT 10;
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . '>  :value ORDER BY '.$field.' LIMIT ' .$limit);

		$stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

		$criteria = [
			'value' => $value
			
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	//Search for multiple columns and values using array, Adapted from the given insert function
	public function findArray($array) {
		$keys = array_keys($array);

		$values = implode(', ', $keys);
		$valuesWithColon = implode(', :', $keys);

		$query = 'SELECT * FROM ' . $this->table . ' WHERE '. ' (' . $values . ') IN ((:' . $valuesWithColon . '))';
		$stmt = $this->pdo->prepare($query);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
		$stmt->execute($array);
		return $stmt->fetchAll();
}

	public function orderAscend($field){
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY '. $field . ' ASC');

		$stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function findById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE $this->primaryKey = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch();
    }
}