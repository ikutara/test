<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class FacetRequest {
  static $_TSPEC;

  /**
   * @var string
   */
  public $fieldName = null;
  /**
   * @var bool
   */
  public $numerical = null;
  /**
   * @var bool
   */
  public $range = null;
  /**
   * @var int
   */
  public $maxCount = -1;
  /**
   * @var int
   */
  public $minPopulation = 1;
  /**
   * @var int
   */
  public $dateRangeGap = null;
  /**
   * @var int
   */
  public $sortOrder = null;
  /**
   * @var bool
   */
  public $sortAscending = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\FacetValue[]
   */
  public $selectedValues = null;
  /**
   * @var bool
   */
  public $andSelectedValues = false;
  /**
   * @var bool
   */
  public $boundsOnly = false;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'fieldName',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'numerical',
          'type' => TType::BOOL,
          ),
        3 => array(
          'var' => 'range',
          'type' => TType::BOOL,
          ),
        4 => array(
          'var' => 'maxCount',
          'type' => TType::I32,
          ),
        5 => array(
          'var' => 'minPopulation',
          'type' => TType::I32,
          ),
        6 => array(
          'var' => 'dateRangeGap',
          'type' => TType::I32,
          ),
        7 => array(
          'var' => 'sortOrder',
          'type' => TType::I32,
          ),
        8 => array(
          'var' => 'sortAscending',
          'type' => TType::BOOL,
          ),
        90 => array(
          'var' => 'selectedValues',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\FacetValue',
            ),
          ),
        100 => array(
          'var' => 'andSelectedValues',
          'type' => TType::BOOL,
          ),
        110 => array(
          'var' => 'boundsOnly',
          'type' => TType::BOOL,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['fieldName'])) {
        $this->fieldName = $vals['fieldName'];
      }
      if (isset($vals['numerical'])) {
        $this->numerical = $vals['numerical'];
      }
      if (isset($vals['range'])) {
        $this->range = $vals['range'];
      }
      if (isset($vals['maxCount'])) {
        $this->maxCount = $vals['maxCount'];
      }
      if (isset($vals['minPopulation'])) {
        $this->minPopulation = $vals['minPopulation'];
      }
      if (isset($vals['dateRangeGap'])) {
        $this->dateRangeGap = $vals['dateRangeGap'];
      }
      if (isset($vals['sortOrder'])) {
        $this->sortOrder = $vals['sortOrder'];
      }
      if (isset($vals['sortAscending'])) {
        $this->sortAscending = $vals['sortAscending'];
      }
      if (isset($vals['selectedValues'])) {
        $this->selectedValues = $vals['selectedValues'];
      }
      if (isset($vals['andSelectedValues'])) {
        $this->andSelectedValues = $vals['andSelectedValues'];
      }
      if (isset($vals['boundsOnly'])) {
        $this->boundsOnly = $vals['boundsOnly'];
      }
    }
  }

  public function getName() {
    return 'FacetRequest';
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
            $xfer += $input->readString($this->fieldName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->numerical);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->range);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->maxCount);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->minPopulation);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->dateRangeGap);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->sortOrder);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->sortAscending);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 90:
          if ($ftype == TType::LST) {
            $this->selectedValues = array();
            $_size21 = 0;
            $_etype24 = 0;
            $xfer += $input->readListBegin($_etype24, $_size21);
            for ($_i25 = 0; $_i25 < $_size21; ++$_i25)
            {
              $elem26 = null;
              $elem26 = new \com\boxalino\p13n\api\thrift\FacetValue();
              $xfer += $elem26->read($input);
              $this->selectedValues []= $elem26;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 100:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->andSelectedValues);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 110:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->boundsOnly);
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
    $xfer += $output->writeStructBegin('FacetRequest');
    if ($this->fieldName !== null) {
      $xfer += $output->writeFieldBegin('fieldName', TType::STRING, 1);
      $xfer += $output->writeString($this->fieldName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->numerical !== null) {
      $xfer += $output->writeFieldBegin('numerical', TType::BOOL, 2);
      $xfer += $output->writeBool($this->numerical);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->range !== null) {
      $xfer += $output->writeFieldBegin('range', TType::BOOL, 3);
      $xfer += $output->writeBool($this->range);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->maxCount !== null) {
      $xfer += $output->writeFieldBegin('maxCount', TType::I32, 4);
      $xfer += $output->writeI32($this->maxCount);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->minPopulation !== null) {
      $xfer += $output->writeFieldBegin('minPopulation', TType::I32, 5);
      $xfer += $output->writeI32($this->minPopulation);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->dateRangeGap !== null) {
      $xfer += $output->writeFieldBegin('dateRangeGap', TType::I32, 6);
      $xfer += $output->writeI32($this->dateRangeGap);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->sortOrder !== null) {
      $xfer += $output->writeFieldBegin('sortOrder', TType::I32, 7);
      $xfer += $output->writeI32($this->sortOrder);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->sortAscending !== null) {
      $xfer += $output->writeFieldBegin('sortAscending', TType::BOOL, 8);
      $xfer += $output->writeBool($this->sortAscending);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->selectedValues !== null) {
      if (!is_array($this->selectedValues)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('selectedValues', TType::LST, 90);
      {
        $output->writeListBegin(TType::STRUCT, count($this->selectedValues));
        {
          foreach ($this->selectedValues as $iter27)
          {
            $xfer += $iter27->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->andSelectedValues !== null) {
      $xfer += $output->writeFieldBegin('andSelectedValues', TType::BOOL, 100);
      $xfer += $output->writeBool($this->andSelectedValues);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->boundsOnly !== null) {
      $xfer += $output->writeFieldBegin('boundsOnly', TType::BOOL, 110);
      $xfer += $output->writeBool($this->boundsOnly);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}