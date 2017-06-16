<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class Hit {
  static $_TSPEC;

  /**
   * @var array
   */
  public $values = null;
  /**
   * @var double
   */
  public $score = null;
  /**
   * @var string
   */
  public $scenarioId = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'values',
          'type' => TType::MAP,
          'ktype' => TType::STRING,
          'vtype' => TType::LST,
          'key' => array(
            'type' => TType::STRING,
          ),
          'val' => array(
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
              'type' => TType::STRING,
              ),
            ),
          ),
        2 => array(
          'var' => 'score',
          'type' => TType::DOUBLE,
          ),
        30 => array(
          'var' => 'scenarioId',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['values'])) {
        $this->values = $vals['values'];
      }
      if (isset($vals['score'])) {
        $this->score = $vals['score'];
      }
      if (isset($vals['scenarioId'])) {
        $this->scenarioId = $vals['scenarioId'];
      }
    }
  }

  public function getName() {
    return 'Hit';
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
          if ($ftype == TType::MAP) {
            $this->values = array();
            $_size109 = 0;
            $_ktype110 = 0;
            $_vtype111 = 0;
            $xfer += $input->readMapBegin($_ktype110, $_vtype111, $_size109);
            for ($_i113 = 0; $_i113 < $_size109; ++$_i113)
            {
              $key114 = '';
              $val115 = array();
              $xfer += $input->readString($key114);
              $val115 = array();
              $_size116 = 0;
              $_etype119 = 0;
              $xfer += $input->readListBegin($_etype119, $_size116);
              for ($_i120 = 0; $_i120 < $_size116; ++$_i120)
              {
                $elem121 = null;
                $xfer += $input->readString($elem121);
                $val115 []= $elem121;
              }
              $xfer += $input->readListEnd();
              $this->values[$key114] = $val115;
            }
            $xfer += $input->readMapEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->score);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 30:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->scenarioId);
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
    $xfer += $output->writeStructBegin('Hit');
    if ($this->values !== null) {
      if (!is_array($this->values)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('values', TType::MAP, 1);
      {
        $output->writeMapBegin(TType::STRING, TType::LST, count($this->values));
        {
          foreach ($this->values as $kiter122 => $viter123)
          {
            $xfer += $output->writeString($kiter122);
            {
              $output->writeListBegin(TType::STRING, count($viter123));
              {
                foreach ($viter123 as $iter124)
                {
                  $xfer += $output->writeString($iter124);
                }
              }
              $output->writeListEnd();
            }
          }
        }
        $output->writeMapEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->score !== null) {
      $xfer += $output->writeFieldBegin('score', TType::DOUBLE, 2);
      $xfer += $output->writeDouble($this->score);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->scenarioId !== null) {
      $xfer += $output->writeFieldBegin('scenarioId', TType::STRING, 30);
      $xfer += $output->writeString($this->scenarioId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}