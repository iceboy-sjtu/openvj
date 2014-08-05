<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class VJModelsSystemHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="custom_id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['v'])) {
            $value = $data['v'];
            $return = (string) $value;
            $this->class->reflFields['v']->setValue($document, $return);
            $hydratedData['v'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['d'])) {
            $value = $data['d'];
            $return = (string) $value;
            $this->class->reflFields['d']->setValue($document, $return);
            $hydratedData['d'] = $return;
        }
        return $hydratedData;
    }
}