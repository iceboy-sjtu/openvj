<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class VJModelsUser_THydrator implements HydratorInterface
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

        /** @Field(type="id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = $value instanceof \MongoId ? (string) $value : $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['uid'])) {
            $value = $data['uid'];
            $return = (string) $value;
            $this->class->reflFields['uid']->setValue($document, $return);
            $hydratedData['uid'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['luser'])) {
            $value = $data['luser'];
            $return = (string) $value;
            $this->class->reflFields['luser']->setValue($document, $return);
            $hydratedData['luser'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['nick'])) {
            $value = $data['nick'];
            $return = (string) $value;
            $this->class->reflFields['nick']->setValue($document, $return);
            $hydratedData['nick'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['lnick'])) {
            $value = $data['lnick'];
            $return = (string) $value;
            $this->class->reflFields['lnick']->setValue($document, $return);
            $hydratedData['lnick'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['salt'])) {
            $value = $data['salt'];
            $return = (string) $value;
            $this->class->reflFields['salt']->setValue($document, $return);
            $hydratedData['salt'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['pass'])) {
            $value = $data['pass'];
            $return = (string) $value;
            $this->class->reflFields['pass']->setValue($document, $return);
            $hydratedData['pass'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['passfmt'])) {
            $value = $data['passfmt'];
            $return = (string) $value;
            $this->class->reflFields['passfmt']->setValue($document, $return);
            $hydratedData['passfmt'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['ipmatch'])) {
            $value = $data['ipmatch'];
            $return = (string) $value;
            $this->class->reflFields['ipmatch']->setValue($document, $return);
            $hydratedData['ipmatch'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['mail'])) {
            $value = $data['mail'];
            $return = (string) $value;
            $this->class->reflFields['mail']->setValue($document, $return);
            $hydratedData['mail'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['qq'])) {
            $value = $data['qq'];
            $return = (string) $value;
            $this->class->reflFields['qq']->setValue($document, $return);
            $hydratedData['qq'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['rp'])) {
            $value = $data['rp'];
            $return = (string) $value;
            $this->class->reflFields['rp']->setValue($document, $return);
            $hydratedData['rp'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['vjb'])) {
            $value = $data['vjb'];
            $return = (string) $value;
            $this->class->reflFields['vjb']->setValue($document, $return);
            $hydratedData['vjb'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['rank'])) {
            $value = $data['rank'];
            $return = (string) $value;
            $this->class->reflFields['rank']->setValue($document, $return);
            $hydratedData['rank'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['g'])) {
            $value = $data['g'];
            $return = (string) $value;
            $this->class->reflFields['g']->setValue($document, $return);
            $hydratedData['g'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['gmd5'])) {
            $value = $data['gmd5'];
            $return = (string) $value;
            $this->class->reflFields['gmd5']->setValue($document, $return);
            $hydratedData['gmd5'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['gender'])) {
            $value = $data['gender'];
            $return = (string) $value;
            $this->class->reflFields['gender']->setValue($document, $return);
            $hydratedData['gender'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['tlogin'])) {
            $value = $data['tlogin'];
            $return = (string) $value;
            $this->class->reflFields['tlogin']->setValue($document, $return);
            $hydratedData['tlogin'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['iplogin'])) {
            $value = $data['iplogin'];
            $return = (string) $value;
            $this->class->reflFields['iplogin']->setValue($document, $return);
            $hydratedData['iplogin'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['treg'])) {
            $value = $data['treg'];
            $return = (string) $value;
            $this->class->reflFields['treg']->setValue($document, $return);
            $hydratedData['treg'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['ipreg'])) {
            $value = $data['ipreg'];
            $return = (string) $value;
            $this->class->reflFields['ipreg']->setValue($document, $return);
            $hydratedData['ipreg'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['sig'])) {
            $value = $data['sig'];
            $return = (string) $value;
            $this->class->reflFields['sig']->setValue($document, $return);
            $hydratedData['sig'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['sigm'])) {
            $value = $data['sigm'];
            $return = (string) $value;
            $this->class->reflFields['sigm']->setValue($document, $return);
            $hydratedData['sigm'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['group'])) {
            $value = $data['group'];
            $return = (string) $value;
            $this->class->reflFields['group']->setValue($document, $return);
            $hydratedData['group'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['acl'])) {
            $value = $data['acl'];
            $return = (string) $value;
            $this->class->reflFields['acl']->setValue($document, $return);
            $hydratedData['acl'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['aclrule'])) {
            $value = $data['aclrule'];
            $return = (string) $value;
            $this->class->reflFields['aclrule']->setValue($document, $return);
            $hydratedData['aclrule'] = $return;
        }

        /** @EmbedOne */
        if (isset($data['privacy'])) {
            $embeddedDocument = $data['privacy'];
            $className = $this->unitOfWork->getClassNameForAssociation($this->class->fieldMappings['privacy'], $embeddedDocument);
            $embeddedMetadata = $this->dm->getClassMetadata($className);
            $return = $embeddedMetadata->newInstance();

            $embeddedData = $this->dm->getHydratorFactory()->hydrate($return, $embeddedDocument, $hints);
            $embeddedId = $embeddedMetadata->identifier && isset($embeddedData[$embeddedMetadata->identifier]) ? $embeddedData[$embeddedMetadata->identifier] : null;

            $this->unitOfWork->registerManaged($return, $embeddedId, $embeddedData);
            $this->unitOfWork->setParentAssociation($return, $this->class->fieldMappings['privacy'], $document, 'privacy');

            $this->class->reflFields['privacy']->setValue($document, $return);
            $hydratedData['privacy'] = $return;
        }

        /** @EmbedOne */
        if (isset($data['stars'])) {
            $embeddedDocument = $data['stars'];
            $className = $this->unitOfWork->getClassNameForAssociation($this->class->fieldMappings['stars'], $embeddedDocument);
            $embeddedMetadata = $this->dm->getClassMetadata($className);
            $return = $embeddedMetadata->newInstance();

            $embeddedData = $this->dm->getHydratorFactory()->hydrate($return, $embeddedDocument, $hints);
            $embeddedId = $embeddedMetadata->identifier && isset($embeddedData[$embeddedMetadata->identifier]) ? $embeddedData[$embeddedMetadata->identifier] : null;

            $this->unitOfWork->registerManaged($return, $embeddedId, $embeddedData);
            $this->unitOfWork->setParentAssociation($return, $this->class->fieldMappings['stars'], $document, 'stars');

            $this->class->reflFields['stars']->setValue($document, $return);
            $hydratedData['stars'] = $return;
        }

        /** @Field(type="hash") */
        if (isset($data['pbms'])) {
            $value = $data['pbms'];
            $return = $value;
            $this->class->reflFields['pbms']->setValue($document, $return);
            $hydratedData['pbms'] = $return;
        }

        /** @Field(type="hash") */
        if (isset($data['settings'])) {
            $value = $data['settings'];
            $return = $value;
            $this->class->reflFields['settings']->setValue($document, $return);
            $hydratedData['settings'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['banned'])) {
            $value = $data['banned'];
            $return = (string) $value;
            $this->class->reflFields['banned']->setValue($document, $return);
            $hydratedData['banned'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['deleted'])) {
            $value = $data['deleted'];
            $return = (string) $value;
            $this->class->reflFields['deleted']->setValue($document, $return);
            $hydratedData['deleted'] = $return;
        }
        return $hydratedData;
    }
}