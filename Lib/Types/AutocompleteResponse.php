<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class AutocompleteResponse {
  static $_TSPEC;

  /**
   * @var \com\boxalino\p13n\api\thrift\AutocompleteHit[]
   */
  public $hits = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\SearchResult
   */
  public $prefixSearchResult = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\PropertyResult[]
   */
  public $propertyResults = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        11 => array(
          'var' => 'hits',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\AutocompleteHit',
            ),
          ),
        21 => array(
          'var' => 'prefixSearchResult',
          'type' => TType::STRUCT,
          'class' => '\com\boxalino\p13n\api\thrift\SearchResult',
          ),
        31 => array(
          'var' => 'propertyResults',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\PropertyResult',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['hits'])) {
        $this->hits = $vals['hits'];
      }
      if (isset($vals['prefixSearchResult'])) {
        $this->prefixSearchResult = $vals['prefixSearchResult'];
      }
      if (isset($vals['propertyResults'])) {
        $this->propertyResults = $vals['propertyResults'];
      }
    }
  }

  public function getName() {
    return 'AutocompleteResponse';
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
        case 11:
          if ($ftype == TType::LST) {
            $this->hits = array();
            $_size253 = 0;
            $_etype256 = 0;
            $xfer += $input->readListBegin($_etype256, $_size253);
            for ($_i257 = 0; $_i257 < $_size253; ++$_i257)
            {
              $elem258 = null;
              $elem258 = new \com\boxalino\p13n\api\thrift\AutocompleteHit();
              $xfer += $elem258->read($input);
              $this->hits []= $elem258;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 21:
          if ($ftype == TType::STRUCT) {
            $this->prefixSearchResult = new \com\boxalino\p13n\api\thrift\SearchResult();
            $xfer += $this->prefixSearchResult->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 31:
          if ($ftype == TType::LST) {
            $this->propertyResults = array();
            $_size259 = 0;
            $_etype262 = 0;
            $xfer += $input->readListBegin($_etype262, $_size259);
            for ($_i263 = 0; $_i263 < $_size259; ++$_i263)
            {
              $elem264 = null;
              $elem264 = new \com\boxalino\p13n\api\thrift\PropertyResult();
              $xfer += $elem264->read($input);
              $this->propertyResults []= $elem264;
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
    $xfer += $output->writeStructBegin('AutocompleteResponse');
    if ($this->hits !== null) {
      if (!is_array($this->hits)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('hits', TType::LST, 11);
      {
        $output->writeListBegin(TType::STRUCT, count($this->hits));
        {
          foreach ($this->hits as $iter265)
          {
            $xfer += $iter265->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->prefixSearchResult !== null) {
      if (!is_object($this->prefixSearchResult)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('prefixSearchResult', TType::STRUCT, 21);
      $xfer += $this->prefixSearchResult->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->propertyResults !== null) {
      if (!is_array($this->propertyResults)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('propertyResults', TType::LST, 31);
      {
        $output->writeListBegin(TType::STRUCT, count($this->propertyResults));
        {
          foreach ($this->propertyResults as $iter266)
          {
            $xfer += $iter266->write($output);
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