<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

require_once dirname(__FILE__) . '/XMLElement.php';
require_once dirname(__FILE__) . '/IDMethod.php';
require_once dirname(__FILE__) . '/NameGenerator.php';
require_once dirname(__FILE__) . '/Table.php';
require_once dirname(__FILE__) . '/Behavior.php';

/**
 * A class for holding application data structures.
 *
 * @author     Hans Lellelid <hans@xmpl.org> (Propel)
 * @author     Leon Messerschmidt <leon@opticode.co.za> (Torque)
 * @author     John McNally<jmcnally@collab.net> (Torque)
 * @author     Martin Poeschl<mpoeschl@marmot.at> (Torque)
 * @author     Daniel Rall<dlr@collab.net> (Torque)
 * @author     Byron Foster <byron_foster@yahoo.com> (Torque)
 * @version    $Revision: 2003 $
 * @package    propel.generator.model
 */
class Database extends XMLElement
{

	private $platform;
	private $tableList = array();
	private $curColumn;
	private $name;
	private $pkg;

	/**
	 * Namespace for the generated OM.
	 *
	 * @var       string
	 */
	protected $namespace;

	private $baseClass;
	private $basePeer;
	private $defaultIdMethod;
	private $defaultPhpNamingMethod;
	private $defaultTranslateMethod;
	private $dbParent;
	private $tablesByName = array();
	private $tablesByLowercaseName = array();
	private $tablesByPhpName = array();
	private $heavyIndexing;
	protected $tablePrefix = '';

	/**
	 * The default string format for objects based on this database
	 * (e.g. 'XML', 'YAML', 'CSV', 'JSON')
	 *
	 * @var       string
	 */
	protected $defaultStringFormat;

	private $domainMap = array();

	/**
	 * List of behaviors registered for this table
	 * 
	 * @var array
	 */
	protected $behaviors = array();

	/**
	 * Constructs a new Database object.
	 *
	 * @param      string $name
	 */
	public function __construct($name = null)
	{
		$this->name = $name;
	}

	/**
	 * Sets up the Database object based on the attributes that were passed to loadFromXML().
	 * @see        parent::loadFromXML()
	 */
	protected function setupObject()
	{
		$this->name = $this->getAttribute("name");
		$namespace = $this->getAttribute("namespace", '');
		$package = $this->getAttribute("package");
		if ($namespace && !$package && $this->getBuildProperty('namespaceAutoPackage')) {
			$package = str_replace('\\', '.', $namespace);
		}
		$this->namespace = $namespace;
		$this->pkg = $package;
		$this->baseClass = $this->getAttribute("baseClass");
		$this->basePeer = $this->getAttribute("basePeer");
		$this->defaultIdMethod = $this->getAttribute("defaultIdMethod", IDMethod::NATIVE);
		$this->defaultPhpNamingMethod = $this->getAttribute("defaultPhpNamingMethod", NameGenerator::CONV_METHOD_UNDERSCORE);
		$this->defaultTranslateMethod = $this->getAttribute("defaultTranslateMethod", Validator::TRANSLATE_NONE);
		$this->heavyIndexing = $this->booleanValue($this->getAttribute("heavyIndexing"));
		$this->tablePrefix = $this->getAttribute('tablePrefix', $this->getBuildProperty('tablePrefix'));
		$this->defaultStringFormat = $this->getAttribute('defaultStringFormat', 'YAML');
	}

	/**
	 * Returns the PropelPlatformInterface implementation for this database.
	 *
	 * @return     PropelPlatformInterface a Platform implementation
	 */
	public function getPlatform()
	{
		return $this->platform;
	}

	/**
	 * Sets the PropelPlatformInterface implementation for this database.
	 *
	 * @param      PropelPlatformInterface $platform A Platform implementation
	 */
	public function setPlatform($platform)
	{
		$this->platform = $platform;
	}

	/**
	 * Get the name of the Database
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the name of the Database
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Get the value of package.
	 * @return     value of package.
	 */
	public function getPackage()
	{
		return $this->pkg;
	}

	/**
	 * Set the value of package.
	 * @param      v  Value to assign to package.
	 */
	public function setPackage($v)
	{
		$this->pkg = $v;
	}

	/**
	 * Get the value of the namespace.
	 * @return     value of namespace.
	 */
	public function getNamespace()
	{
		return $this->namespace;
	}

	/**
	 * Set the value of the namespace.
	 * @param      v  Value to assign to namespace.
	 */
	public function setNamespace($v)
	{
		$this->namespace = $v;
	}

	/**
	 * Get the value of baseClass.
	 * @return     value of baseClass.
	 */
	public function getBaseClass()
	{
		return $this->baseClass;
	}

	/**
	 * Set the value of baseClass.
	 * @param      v  Value to assign to baseClass.
	 */
	public function setBaseClass($v)
	{
		$this->baseClass = $v;
	}

	/**
	 * Get the value of basePeer.
	 * @return     value of basePeer.
	 */
	public function getBasePeer()
	{
		return $this->basePeer;
	}

	/**
	 * Set the value of basePeer.
	 * @param      v Value to assign to basePeer.
	 */
	public function setBasePeer($v)
	{
		$this->basePeer = $v;
	}

	/**
	 * Get the value of defaultIdMethod.
	 * @return     value of defaultIdMethod.
	 */
	public function getDefaultIdMethod()
	{
		return $this->defaultIdMethod;
	}

	/**
	 * Set the value of defaultIdMethod.
	 * @param      v Value to assign to defaultIdMethod.
	 */
	public function setDefaultIdMethod($v)
	{
		$this->defaultIdMethod = $v;
	}

	/**
	 * Get the value of defaultPHPNamingMethod which specifies the
	 * method for converting schema names for table and column to PHP names.
	 * @return     string The default naming conversion used by this database.
	 */
	public function getDefaultPhpNamingMethod()
	{
		return $this->defaultPhpNamingMethod;
	}

	/**
	 * Set the value of defaultPHPNamingMethod.
	 * @param      string $v The default naming conversion for this database to use.
	 */
	public function setDefaultPhpNamingMethod($v)
	{
		$this->defaultPhpNamingMethod = $v;
	}

	/**
	 * Get the value of defaultTranslateMethod which specifies the
	 * method for translate validator error messages.
	 * @return     string The default translate method.
	 */
	public function getDefaultTranslateMethod()
	{
		return $this->defaultTranslateMethod;
	}

	/**
	 * Set the default string format for ActiveRecord objects in this Db.
	 *
	 * @param      string $defaultStringFormat Any of 'XML', 'YAML', 'JSON', or 'CSV'
	 */
	public function setDefaultStringFormat($defaultStringFormat)
	{
		$this->defaultStringFormat = $defaultStringFormat;
	}

	/**
	 * Get the default string format for ActiveRecord objects in this Db.
	 *
	 * @return     string The default string format
	 */
	public function getDefaultStringFormat()
	{
		return $this->defaultStringFormat;
	}

	/**
	 * Set the value of defaultTranslateMethod.
	 * @param      string $v The default translate method to use.
	 */
	public function setDefaultTranslateMethod($v)
	{
		$this->defaultTranslateMethod = $v;
	}
	
	/**
	 * Get the value of heavyIndexing.
	 *
	 * This is a synonym for getHeavyIndexing().
	 *
	 * @return     boolean Value of heavyIndexing.
	 * @see        getHeavyIndexing()
	 */
	public function isHeavyIndexing()
	{
		return $this->getHeavyIndexing();
	}

	/**
	 * Get the value of heavyIndexing.
	 *
	 * @return     boolean Value of heavyIndexing.
	 */
	public function getHeavyIndexing()
	{
		return $this->heavyIndexing;
	}

	/**
	 * Set the value of heavyIndexing.
	 * @param      boolean $v  Value to assign to heavyIndexing.
	 */
	public function setHeavyIndexing($v)
	{
		$this->heavyIndexing = (boolean) $v;
	}

	/**
	 * Return the list of all tables
	 * @return array
	 */
	public function getTables()
	{
		return $this->tableList;
	}
	
	/**
	 * Return the number of tables in the database
	 * @return integer
	 */
	public function countTables()
	{
		return count($this->tableList);
	}

	/**
	 * Return the list of all tables that have a SQL representation
	 * @return array
	 */
	public function getTablesForSql()
	{
		$tables = array();
		foreach ($this->tableList as $table) {
			if (!$table->isSkipSql()) {
				$tables []= $table;
			}
		}
		return $tables;
	}

	/**
	 * Check whether the database has a table.
	 * @param      string $name the name of the table (e.g. 'my_table')
	 * @param      boolean $caseInsensitive Whether the check is case insensitive. False by default.
	 *
	 * @return     boolean
	 */
	public function hasTable($name, $caseInsensitive = false)
	{
		if ($caseInsensitive) {
			return array_key_exists(strtolower($name), $this->tablesByLowercaseName);
		} else {
			return array_key_exists($name, $this->tablesByName);
		}
	}

	/**
	 * Return the table with the specified name.
	 * @param      string $name The name of the table (e.g. 'my_table')
	 * @param      boolean $caseInsensitive Whether the check is case insensitive. False by default.
	 *
	 * @return     Table a Table object or null if it doesn't exist
	 */
	public function getTable($name, $caseInsensitive = false)
	{
		if ($this->hasTable($name, $caseInsensitive)) {
			if ($caseInsensitive) {
				return $this->tablesByLowercaseName[strtolower($name)];
			} else {
				return $this->tablesByName[$name];
			}
		}
		return null; // just to be explicit
	}

	/**
	 * Check whether the database has a table.
	 * @param      string $phpName the PHP Name of the table (e.g. 'MyTable')
	 * @return     boolean
	 */
	public function hasTableByPhpName($phpName)
	{
		return array_key_exists($phpName, $this->tablesByPhpName);
	}
	
	/**
	 * Return the table with the specified phpName.
	 * @param      string $phpName the PHP Name of the table (e.g. 'MyTable')
	 * @return     Table a Table object or null if it doesn't exist
	 */
	public function getTableByPhpName($phpName)
	{
		if (isset($this->tablesByPhpName[$phpName])) {
			return $this->tablesByPhpName[$phpName];
		}
		return null; // just to be explicit
	}

	/**
	 * An utility method to add a new table from an xml attribute.
	 */
	public function addTable($data)
	{
		if ($data instanceof Table) {
			$tbl = $data; // alias
			$tbl->setDatabase($this);
			if (isset($this->tablesByName[$tbl->getName()])) {
				throw new EngineException("Duplicate table declared: " . $tbl->getName());
			}
			$this->tableList[] = $tbl;
			$this->tablesByName[$tbl->getName()] = $tbl;
			$this->tablesByLowercaseName[strtolower($tbl->getName())] = $tbl;
			$this->tablesByPhpName[ $tbl->getPhpName() ] = $tbl;
			if ($tbl->getPackage() === null) {
				$tbl->setPackage($this->getPackage());
			}
			return $tbl;
		} else {
			$tbl = new Table();
			$tbl->setDatabase($this);
			$tbl->loadFromXML($data);
			return $this->addTable($tbl); // call self w/ different param
		}
	}

	/**
	 * Set the parent of the database
	 */
	public function setAppData(AppData $parent)
	{
		$this->dbParent = $parent;
	}

	/**
	 * Get the parent of the table
	 */
	public function getAppData()
	{
		return $this->dbParent;
	}

	/**
	 * Adds Domain object from <domain> tag.
	 * @param      mixed XML attributes (array) or Domain object.
	 */
	public function addDomain($data) {

		if ($data instanceof Domain) {
			$domain = $data; // alias
			$domain->setDatabase($this);
			$this->domainMap[ $domain->getName() ] = $domain;
			return $domain;
		} else {
			$domain = new Domain();
			$domain->setDatabase($this);
			$domain->loadFromXML($data);
			return $this->addDomain($domain); // call self w/ different param
		}
	}

	/**
	 * Get already configured Domain object by name.
	 * @return     Domain
	 */
	public function getDomain($domainName)
	{
		if (isset($this->domainMap[$domainName])) {
			return $this->domainMap[$domainName];
		}
		return null; // just to be explicit
	}

  public function getGeneratorConfig()
  {
  	if ($this->getAppData()) {
  		return $this->getAppData()->getGeneratorConfig();
  	} else {
  		return null;
  	}
  }
  
  public function getBuildProperty($key)
  {
  	if($config = $this->getGeneratorConfig()) {
  		return $config->getBuildProperty($key);
  	} else {
  		return '';
  	}
  }
  
  /**
   * Adds a new Behavior to the database
   * @return Behavior A behavior instance
   */
  public function addBehavior($bdata)
  {
    if ($bdata instanceof Behavior) {
      $behavior = $bdata;
      $behavior->setDatabase($this);
      $this->behaviors[$behavior->getName()] = $behavior;
      return $behavior;
    } else {
      $class = $this->getConfiguredBehavior($bdata['name']);
      $behavior = new $class();
      $behavior->loadFromXML($bdata);
      return $this->addBehavior($behavior);
    }
  }
  
  /**
   * Get the database behaviors
   * @return Array of Behavior objects
   */
  public function getBehaviors()
  {
    return $this->behaviors;
  }
  
  /**
	 * check if the database has a behavior by name
	 *
	 * @param     string $name the behavior name
	 * @return    boolean True if the behavior exists
	 */
	public function hasBehavior($name)
	{
		return array_key_exists($name, $this->behaviors);
	}
	
  /**
   * Get one database behavior by name
   * @param string $name the behavior name
   * @return Behavior a behavior object
   */
  public function getBehavior($name)
  {
    return $this->behaviors[$name];
  }

  /**
   * Get the table prefix for this database
   *
   * @return string the table prefix
   */
  public function getTablePrefix()
  {
    return $this->tablePrefix;
  }


	public function doFinalInitialization()
	{
		if($defaultBehaviors = $this->getBuildProperty('behaviorDefault')) {
			// add generic behaviors from build.properties 
			$defaultBehaviors = explode(',', $defaultBehaviors);
			foreach ($defaultBehaviors as $behavior) {
				$this->addBehavior(array('name' => trim($behavior)));
			}
		}
		
		// execute behavior database modifiers
		foreach ($this->getBehaviors() as $behavior) {
			$behavior->modifyDatabase();
		}

		$tables = $this->getTables();
		
		// execute early table behaviors
		foreach ($tables as $table) {
			foreach ($table->getEarlyBehaviors() as $behavior) {
				if (!$behavior->isTableModified()) {
					$behavior->getTableModifier()->modifyTable();
					$behavior->setTableModified(true);
				}
			}
		}
			
		foreach ($tables as $table) {

			$table->doFinalInitialization();

			// setup reverse fk relations
			$fks = $table->getForeignKeys();
			foreach ($table->getForeignKeys() as $foreignKey) {
				$foreignTable = $this->getTable($foreignKey->getForeignTableName());
				if ($foreignTable === null) {
					throw new BuildException(sprintf(
						'Table "%s" contains a foreign key to nonexistent table "%s"',
						$table->getName(),
						$foreignKey->getForeignTableName()
					));
				}

				$referrers = $foreignTable->getReferrers();
				if ($referrers === null || !in_array($foreignKey, $referrers, true) ) {
					$foreignTable->addReferrer($foreignKey);
				}

				// local column references
				$localColumnNames = $foreignKey->getLocalColumns();
				foreach ($localColumnNames as $localColumnName) {
					$localColumn = $table->getColumn($localColumnName);
					// give notice of a schema inconsistency.
					// note we do not prevent the npe as there is nothing
					// that we can do, if it is to occur.
					if ($localColumn === null) {
						throw new BuildException(sprintf(
							'Table "%s" contains a foreign key with nonexistent local column "%s"',
							$table->getName(),
							$localColumnName
						));
					}
					// check for foreign pk's
					if ($localColumn->isPrimaryKey()) {
						$table->setContainsForeignPK(true);
					}
				} // foreach localColumnNames

				// foreign column references
				$foreignColumnNames = $foreignKey->getForeignColumns();
				foreach ($foreignColumnNames as $foreignColumnName) {
					$foreignColumn = $foreignTable->getColumn($foreignColumnName);
					// if the foreign column does not exist, we may have an
					// external reference or a misspelling
					if ($foreignColumn === null) {
						throw new BuildException(sprintf(
							'Table "%s" contains a foreign key to table "%s" with nonexistent column "%s"',
							$table->getName(),
							$foreignTable->getName(),
							$foreignColumnName
						));
					} else {
						$foreignColumn->addReferrer($foreignKey);
					}
				} // foreach foreignColumnNames
				
				if ($this->platform instanceof MysqlPLatform) {
					$table->addExtraIndices();
				}
			} // foreach foreign keys
		} // foreach tables
		
		// Behaviors may have added behaviors of their own
		// These behaviors must launch their modifyTable() method,
		// Until there is no behavior left
		$behaviorsLeft = true;
		while ($behaviorsLeft) {
			$behaviorsLeft = false;
			foreach ($tables as $table) {
				foreach ($table->getBehaviors() as $behavior) {
					if (!$behavior->isTableModified()) {
						$behavior->getTableModifier()->modifyTable();
						$behavior->setTableModified(true);
						$behaviorsLeft = true;
					}
				}
			}
		}
	}

	/**
	 * @see        XMLElement::appendXml(DOMNode)
	 */
	public function appendXml(DOMNode $node)
	{
		$doc = ($node instanceof DOMDocument) ? $node : $node->ownerDocument;

		$dbNode = $node->appendChild($doc->createElement('database'));

		$dbNode->setAttribute('name', $this->name);

		if ($this->pkg) {
			$dbNode->setAttribute('package', $this->pkg);
		}

		if ($this->defaultIdMethod) {
			$dbNode->setAttribute('defaultIdMethod', $this->defaultIdMethod);
		}

		if ($this->baseClass) {
			$dbNode->setAttribute('baseClass', $this->baseClass);
		}

		if ($this->basePeer) {
			$dbNode->setAttribute('basePeer', $this->basePeer);
		}

		if ($this->defaultPhpNamingMethod) {
			$dbNode->setAttribute('defaultPhpNamingMethod', $this->defaultPhpNamingMethod);
		}

		if ($this->defaultTranslateMethod) {
			$dbNode->setAttribute('defaultTranslateMethod', $this->defaultTranslateMethod);
		}

		/*

		FIXME - Before we can add support for domains in the schema, we need
		to have a method of the Column that indicates whether the column was mapped
		to a SPECIFIC domain (since Column->getDomain() will always return a Domain object)

		foreach ($this->domainMap as $domain) {
		$domain->appendXml($dbNode);
		}
		*/
		foreach ($this->vendorInfos as $vi) {
			$vi->appendXml($dbNode);
		}

		foreach ($this->tableList as $table) {
			$table->appendXml($dbNode);
		}

	}
}
