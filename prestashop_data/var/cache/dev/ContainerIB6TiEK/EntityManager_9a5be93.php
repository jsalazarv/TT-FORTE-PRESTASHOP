<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderd7cb1 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer8ae99 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties3bda7 = [
        
    ];

    public function getConnection()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getConnection', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getMetadataFactory', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getExpressionBuilder', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'beginTransaction', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getCache', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getCache();
    }

    public function transactional($func)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'transactional', array('func' => $func), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'wrapInTransaction', array('func' => $func), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'commit', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->commit();
    }

    public function rollback()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'rollback', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getClassMetadata', array('className' => $className), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'createQuery', array('dql' => $dql), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'createNamedQuery', array('name' => $name), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'createQueryBuilder', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'flush', array('entity' => $entity), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'clear', array('entityName' => $entityName), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->clear($entityName);
    }

    public function close()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'close', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->close();
    }

    public function persist($entity)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'persist', array('entity' => $entity), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'remove', array('entity' => $entity), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'refresh', array('entity' => $entity), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'detach', array('entity' => $entity), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'merge', array('entity' => $entity), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getRepository', array('entityName' => $entityName), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'contains', array('entity' => $entity), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getEventManager', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getConfiguration', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'isOpen', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getUnitOfWork', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getProxyFactory', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'initializeObject', array('obj' => $obj), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'getFilters', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'isFiltersStateClean', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'hasFilters', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return $this->valueHolderd7cb1->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer8ae99 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderd7cb1) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderd7cb1 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderd7cb1->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, '__get', ['name' => $name], $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        if (isset(self::$publicProperties3bda7[$name])) {
            return $this->valueHolderd7cb1->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd7cb1;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderd7cb1;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd7cb1;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderd7cb1;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, '__isset', array('name' => $name), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd7cb1;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderd7cb1;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, '__unset', array('name' => $name), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd7cb1;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderd7cb1;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, '__clone', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        $this->valueHolderd7cb1 = clone $this->valueHolderd7cb1;
    }

    public function __sleep()
    {
        $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, '__sleep', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;

        return array('valueHolderd7cb1');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer8ae99 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer8ae99;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer8ae99 && ($this->initializer8ae99->__invoke($valueHolderd7cb1, $this, 'initializeProxy', array(), $this->initializer8ae99) || 1) && $this->valueHolderd7cb1 = $valueHolderd7cb1;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderd7cb1;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderd7cb1;
    }
}
