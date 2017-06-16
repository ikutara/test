<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class FacetResponse {
  static $_TSPEC;

  /**
   * @var string
   */
  public $fieldName = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\FacetValue[]
   */
  public $values = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'fieldName',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'values',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\FacetValue',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['fieldName'])) {
        $this->fieldName = $vals['fieldName'];
      }
      if (isset($vals['values'])) {
        $this->values = $vals['values'];
      }
    }
  }

  public function getName() {
    return 'FacetResponse';
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
          if ($ftype == TType::LST) {
            $this->values = array();
            $_size102 = 0;
            $_etype105 = 0;
            $xfer += $input->readListBegin($_etype105, $_size102);
            for ($_i106 = 0; $_i106 < $_size102; ++$_i106)
            {
              $elem107 = null;
              $elem107 = new \com\boxalino\p13n\api\thrift\FacetValue();
              $xfer += $elem107->read($input);
              $this->values []= $elem107;
            }
            $xfer += $input->readListEnd();
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
    $xfer += $output->writeStructBegin('FacetResponse');
    if ($this->fieldName !== null) {
      $xfer += $output->writeFieldBegin('fieldName', TType::STRING, 1);
      $xfer += $output->writeString($this->fieldName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->values !== null) {
      if (!is_array($this->values)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('values', TType::LST, 2);
      {
        $output->writeListBegin(TType::STRUCT, count($this->values));
        {
          foreach ($this->values as $iter108)
          {
            $xfer += $iter108->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}