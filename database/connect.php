<?php
/*
*Database Connection class
*/

require_once("databaseCredentials.php");

class Connect
{
  //properties
  public $databaseConnection;
  public $result;

  //methods

  /*
  database connection method
  *connect to the database
  @return returns true or false
  */

  function Connect()
  {
    $this->databaseConnection = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

    if (mysqli_connect_errno())
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  /* database query method
  @param sql to be executed
  * @return return true or false
  */

  function Query($sql)
  {
    //check again if connection works
    if ($this->connect())
    {
      //run query
      $this->result = mysqli_query($this->databaseConnection, $sql);

      //check if results were returned
      if($this->result == true)
      {
        return true;
      }
      else
      {
        return false;
      }
   }
  else
    {
      return false; //in php, when a false is returned, the whole code stops.
    }
 }

  /* database fetch method
  *@return return results
  */

  /*database fetch method
	*@return return true or false
	*/

  function fetch()
	{
		// check if results has content
		if($this->result == false)
		{
			return false;
		}

		//return result
		return mysqli_fetch_assoc($this->result);
	}

  function fetchAll()
  {
    // check if results has content
		if($this->result == false)
		{
			return false;
		}

		//return result
		return mysqli_fetch_all($this->result);
  }
}

/*testing
  $test = new Connect;
  var_dump($test->connect()).'<br>';

  $test2 = new Connect;
  var_dump($test2->query('select * from allmajor'));
  echo '<br>';

  $test3 = new Connect;
  var_dump($test3->Fetch());
*/
?>
