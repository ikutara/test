<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class BatchChoiceResponse {
  static $_TSPEC;

  /**
   * @var \com\boxalino\p13n\api\thrift\Variant[]
   */
  public $variants = null;
  /**
   * @var (\com\boxalino\p13n\api\thrift\Variant[])[]
   */
  public $selectedVariants = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'variants',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\Variant',
            ),
          ),
        2 => array(
          'var' => 'selectedVariants',
          'type' => TType::LST,
          'etype' => TType::LST,
          'elem' => array(
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
              'type' => TType::STRUCT,
              'class' => '\com\boxalino\p13n\api\thrift\Variant',
              ),
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['variants'])) {
        $this->variants = $vals['variants'];
      }
      if (isset($vals['selectedVariants'])) {
        $this->selectedVariants = $vals['selectedVariants'];
      }
    }
  }

  public function getName() {
    return 'BatchChoiceResponse';
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
          if ($ftype == TType::LST) {
            $this->variants = array();
            $_size202 = 0;
            $_etype205 = 0;
            $xfer += $input->readListBegin($_etype205, $_size202);
            for ($_i206 = 0; $_i206 < $_size202; ++$_i206)
            {
              $elem207 = null;
              $elem207 = new \com\boxalino\p13n\api\thrift\Variant();
              $xfer += $elem207->read($input);
              $this->variants []= $elem207;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::LST) {
            $this->selectedVariants = array();
            $_size208 = 0;
            $_etype211 = 0;
            $xfer += $input->readListBegin($_etype211, $_size208);
            for ($_i212 = 0; $_i212 < $_size208; ++$_i212)
            {
              $elem213 = null;
              $elem213 = array();
              $_size214 = 0;
              $_etype217 = 0;
              $xfer += $input->readListBegin($_etype217, $_size214);
              for ($_i218 = 0; $_i218 < $_size214; ++$_i218)
              {
                $elem219 = null;
                $elem219 = new \com\boxalino\p13n\api\thrift\Variant();
                $xfer += $elem219->read($input);
                $elem213 []= $elem219;
              }
              $xfer += $input->readListEnd();
              $this->selectedVariants []= $elem213;
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
    $xfer += $output->writeStructBegin('BatchChoiceResponse');
    if ($this->variants !== null) {
      if (!is_array($this->variants)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('variants', TType::LST, 1);
      {
        $output->writeListBegin(TType::STRUCT, count($this->variants));
        {
          foreach ($this->variants as $iter220)
          {
            $xfer += $iter220->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->selectedVariants !== null) {
      if (!is_array($this->selectedVariants)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('selectedVariants', TType::LST, 2);
      {
        $output->writeListBegin(TType::LST, count($this->selectedVariants));
        {
          foreach ($this->selectedVariants as $iter221)
          {
            {
              $output->writeListBegin(TType::STRUCT, count($iter221));
              {
                foreach ($iter221 as $iter222)
                {
                  $xfer += $iter222->write($output);
                }
              }
              $output->writeListEnd();
            }
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