<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class RequestContext {
  static $_TSPEC;

  /**
   * @var array
   */
  public $parameters = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'parameters',
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
        );
    }
    if (is_array($vals)) {
      if (isset($vals['parameters'])) {
        $this->parameters = $vals['parameters'];
      }
    }
  }

  public function getName() {
    return 'RequestContext';
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
            $this->parameters = array();
            $_size79 = 0;
            $_ktype80 = 0;
            $_vtype81 = 0;
            $xfer += $input->readMapBegin($_ktype80, $_vtype81, $_size79);
            for ($_i83 = 0; $_i83 < $_size79; ++$_i83)
            {
              $key84 = '';
              $val85 = array();
              $xfer += $input->readString($key84);
              $val85 = array();
              $_size86 = 0;
              $_etype89 = 0;
              $xfer += $input->readListBegin($_etype89, $_size86);
              for ($_i90 = 0; $_i90 < $_size86; ++$_i90)
              {
                $elem91 = null;
                $xfer += $input->readString($elem91);
                $val85 []= $elem91;
              }
              $xfer += $input->readListEnd();
              $this->parameters[$key84] = $val85;
            }
            $xfer += $input->readMapEnd();
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
    $xfer += $output->writeStructBegin('RequestContext');
    if ($this->parameters !== null) {
      if (!is_array($this->parameters)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('parameters', TType::MAP, 1);
      {
        $output->writeMapBegin(TType::STRING, TType::LST, count($this->parameters));
        {
          foreach ($this->parameters as $kiter92 => $viter93)
          {
            $xfer += $output->writeString($kiter92);
            {
              $output->writeListBegin(TType::STRING, count($viter93));
              {
                foreach ($viter93 as $iter94)
                {
                  $xfer += $output->writeString($iter94);
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
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}