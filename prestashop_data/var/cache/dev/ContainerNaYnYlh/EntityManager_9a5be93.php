<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderb6112 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer45635 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties04e8b = [
        
    ];

    public function getConnection()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getConnection', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getMetadataFactory', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getExpressionBuilder', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'beginTransaction', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getCache', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getCache();
    }

    public function transactional($func)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'transactional', array('func' => $func), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'wrapInTransaction', array('func' => $func), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'commit', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->commit();
    }

    public function rollback()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'rollback', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getClassMetadata', array('className' => $className), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'createQuery', array('dql' => $dql), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'createNamedQuery', array('name' => $name), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'createQueryBuilder', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'flush', array('entity' => $entity), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'clear', array('entityName' => $entityName), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->clear($entityName);
    }

    public function close()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'close', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->close();
    }

    public function persist($entity)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'persist', array('entity' => $entity), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'remove', array('entity' => $entity), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'refresh', array('entity' => $entity), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'detach', array('entity' => $entity), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'merge', array('entity' => $entity), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getRepository', array('entityName' => $entityName), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'contains', array('entity' => $entity), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getEventManager', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getConfiguration', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'isOpen', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getUnitOfWork', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getProxyFactory', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'initializeObject', array('obj' => $obj), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'getFilters', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'isFiltersStateClean', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'hasFilters', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return $this->valueHolderb6112->hasFilters();
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

        $instance->initializer45635 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderb6112) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderb6112 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderb6112->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, '__get', ['name' => $name], $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        if (isset(self::$publicProperties04e8b[$name])) {
            return $this->valueHolderb6112->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb6112;

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

        $targetObject = $this->valueHolderb6112;
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
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb6112;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderb6112;
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
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, '__isset', array('name' => $name), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb6112;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderb6112;
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
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, '__unset', array('name' => $name), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb6112;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderb6112;
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
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, '__clone', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        $this->valueHolderb6112 = clone $this->valueHolderb6112;
    }

    public function __sleep()
    {
        $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, '__sleep', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;

        return array('valueHolderb6112');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer45635 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer45635;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer45635 && ($this->initializer45635->__invoke($valueHolderb6112, $this, 'initializeProxy', array(), $this->initializer45635) || 1) && $this->valueHolderb6112 = $valueHolderb6112;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderb6112;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderb6112;
    }
}
