<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class ChoiceInquiry {
  static $_TSPEC;

  /**
   * @var string
   */
  public $choiceId = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\SimpleSearchQuery
   */
  public $simpleSearchQuery = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\ContextItem[]
   */
  public $contextItems = null;
  /**
   * @var int
   */
  public $minHitCount = null;
  /**
   * @var string[]
   */
  public $excludeVariantIds = null;
  /**
   * @var string
   */
  public $scope = "system_rec";
  /**
   * @var bool
   */
  public $withRelaxation = false;
  /**
   * @var bool
   */
  public $withSemanticFiltering = false;
  /**
   * @var string[]
   */
  public $includeVariantIds = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'choiceId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'simpleSearchQuery',
          'type' => TType::STRUCT,
          'class' => '\com\boxalino\p13n\api\thrift\SimpleSearchQuery',
          ),
        3 => array(
          'var' => 'contextItems',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\ContextItem',
            ),
          ),
        4 => array(
          'var' => 'minHitCount',
          'type' => TType::I32,
          ),
        5 => array(
          'var' => 'excludeVariantIds',
          'type' => TType::SET,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        6 => array(
          'var' => 'scope',
          'type' => TType::STRING,
          ),
        70 => array(
          'var' => 'withRelaxation',
          'type' => TType::BOOL,
          ),
        80 => array(
          'var' => 'withSemanticFiltering',
          'type' => TType::BOOL,
          ),
        90 => array(
          'var' => 'includeVariantIds',
          'type' => TType::SET,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['choiceId'])) {
        $this->choiceId = $vals['choiceId'];
      }
      if (isset($vals['simpleSearchQuery'])) {
        $this->simpleSearchQuery = $vals['simpleSearchQuery'];
      }
      if (isset($vals['contextItems'])) {
        $this->contextItems = $vals['contextItems'];
      }
      if (isset($vals['minHitCount'])) {
        $this->minHitCount = $vals['minHitCount'];
      }
      if (isset($vals['excludeVariantIds'])) {
        $this->excludeVariantIds = $vals['excludeVariantIds'];
      }
      if (isset($vals['scope'])) {
        $this->scope = $vals['scope'];
      }
      if (isset($vals['withRelaxation'])) {
        $this->withRelaxation = $vals['withRelaxation'];
      }
      if (isset($vals['withSemanticFiltering'])) {
        $this->withSemanticFiltering = $vals['withSemanticFiltering'];
      }
      if (isset($vals['includeVariantIds'])) {
        $this->includeVariantIds = $vals['includeVariantIds'];
      }
    }
  }

  public function getName() {
    return 'ChoiceInquiry';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->choiceId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->simpleSearchQuery = new \com\boxalino\p13n\api\thrift\SimpleSearchQuery();
            $xfer += $this->simpleSearchQuery->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::LST) {
            $this->contextItems = array();
            $_size56 = 0;
            $_etype59 = 0;
            $xfer += $input->readListBegin($_etype59, $_size56);
            for ($_i60 = 0; $_i60 < $_size56; ++$_i60)
            {
              $elem61 = null;
              $elem61 = new \com\boxalino\p13n\api\thrift\ContextItem();
              $xfer += $elem61->read($input);
              $this->contextItems []= $elem61;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->minHitCount);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::SET) {
            $this->excludeVariantIds = array();
            $_size62 = 0;
            $_etype65 = 0;
            $xfer += $input->readSetBegin($_etype65, $_size62);
            for ($_i66 = 0; $_i66 < $_size62; ++$_i66)
            {
              $elem67 = null;
              $xfer += $input->readString($elem67);
              if (is_scalar($elem67)) {
                $this->excludeVariantIds[$elem67] = true;
              } else {
                $this->excludeVariantIds []= $elem67;
              }
            }
            $xfer += $input->readSetEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->scope);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 70:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->withRelaxation);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 80:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->withSemanticFiltering);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 90:
          if ($ftype == TType::SET) {
            $this->includeVariantIds = array();
            $_size68 = 0;
            $_etype71 = 0;
            $xfer += $input->readSetBegin($_etype71, $_size68);
            for ($_i72 = 0; $_i72 < $_size68; ++$_i72)
            {
              $elem73 = null;
              $xfer += $input->readString($elem73);
              if (is_scalar($elem73)) {
                $this->includeVariantIds[$elem73] = true;
              } else {
                $this->includeVariantIds []= $elem73;
              }
            }
            $xfer += $input->readSetEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ChoiceInquiry');
    if ($this->choiceId !== null) {
      $xfer += $output->writeFieldBegin('choiceId', TType::STRING, 1);
      $xfer += $output->writeString($this->choiceId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->simpleSearchQuery !== null) {
      if (!is_object($this->simpleSearchQuery)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('simpleSearchQuery', TType::STRUCT, 2);
      $xfer += $this->simpleSearchQuery->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->contextItems !== null) {
      if (!is_array($this->contextItems)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('contextItems', TType::LST, 3);
      {
        $output->writeListBegin(TType::STRUCT, count($this->contextItems));
        {
          foreach ($this->contextItems as $iter74)
          {
            $xfer += $iter74->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->minHitCount !== null) {
      $xfer += $output->writeFieldBegin('minHitCount', TType::I32, 4);
      $xfer += $output->writeI32($this->minHitCount);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->excludeVariantIds !== null) {
      if (!is_array($this->excludeVariantIds)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('excludeVariantIds', TType::SET, 5);
      {
        $output->writeSetBegin(TType::STRING, count($this->excludeVariantIds));
        {
          foreach ($this->excludeVariantIds as $iter75 => $iter76)
          {
            if (is_scalar($iter76)) {
            $xfer += $output->writeString($iter75);
            } else {
            $xfer += $output->writeString($iter76);
            }
          }
        }
        $output->writeSetEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->scope !== null) {
      $xfer += $output->writeFieldBegin('scope', TType::STRING, 6);
      $xfer += $output->writeString($this->scope);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->withRelaxation !== null) {
      $xfer += $output->writeFieldBegin('withRelaxation', TType::BOOL, 70);
      $xfer += $output->writeBool($this->withRelaxation);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->withSemanticFiltering !== null) {
      $xfer += $output->writeFieldBegin('withSemanticFiltering', TType::BOOL, 80);
      $xfer += $output->writeBool($this->withSemanticFiltering);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->includeVariantIds !== null) {
      if (!is_array($this->includeVariantIds)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('includeVariantIds', TType::SET, 90);
      {
        $output->writeSetBegin(TType::STRING, count($this->includeVariantIds));
        {
          foreach ($this->includeVariantIds as $iter77 => $iter78)
          {
            if (is_scalar($iter78)) {
            $xfer += $output->writeString($iter77);
            } else {
            $xfer += $output->writeString($iter78);
            }
          }
        }
        $output->writeSetEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}