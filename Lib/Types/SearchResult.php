<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class SearchResult {
  static $_TSPEC;

  /**
   * @var \com\boxalino\p13n\api\thrift\Hit[]
   */
  public $hits = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\FacetResponse[]
   */
  public $facetResponses = null;
  /**
   * @var int
   */
  public $totalHitCount = null;
  /**
   * @var string
   */
  public $queryText = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\HitsGroup[]
   */
  public $hitsGroups = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'hits',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\Hit',
            ),
          ),
        2 => array(
          'var' => 'facetResponses',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\FacetResponse',
            ),
          ),
        3 => array(
          'var' => 'totalHitCount',
          'type' => TType::I64,
          ),
        40 => array(
          'var' => 'queryText',
          'type' => TType::STRING,
          ),
        50 => array(
          'var' => 'hitsGroups',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\HitsGroup',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['hits'])) {
        $this->hits = $vals['hits'];
      }
      if (isset($vals['facetResponses'])) {
        $this->facetResponses = $vals['facetResponses'];
      }
      if (isset($vals['totalHitCount'])) {
        $this->totalHitCount = $vals['totalHitCount'];
      }
      if (isset($vals['queryText'])) {
        $this->queryText = $vals['queryText'];
      }
      if (isset($vals['hitsGroups'])) {
        $this->hitsGroups = $vals['hitsGroups'];
      }
    }
  }

  public function getName() {
    return 'SearchResult';
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
            $this->hits = array();
            $_size132 = 0;
            $_etype135 = 0;
            $xfer += $input->readListBegin($_etype135, $_size132);
            for ($_i136 = 0; $_i136 < $_size132; ++$_i136)
            {
              $elem137 = null;
              $elem137 = new \com\boxalino\p13n\api\thrift\Hit();
              $xfer += $elem137->read($input);
              $this->hits []= $elem137;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::LST) {
            $this->facetResponses = array();
            $_size138 = 0;
            $_etype141 = 0;
            $xfer += $input->readListBegin($_etype141, $_size138);
            for ($_i142 = 0; $_i142 < $_size138; ++$_i142)
            {
              $elem143 = null;
              $elem143 = new \com\boxalino\p13n\api\thrift\FacetResponse();
              $xfer += $elem143->read($input);
              $this->facetResponses []= $elem143;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->totalHitCount);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 40:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->queryText);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 50:
          if ($ftype == TType::LST) {
            $this->hitsGroups = array();
            $_size144 = 0;
            $_etype147 = 0;
            $xfer += $input->readListBegin($_etype147, $_size144);
            for ($_i148 = 0; $_i148 < $_size144; ++$_i148)
            {
              $elem149 = null;
              $elem149 = new \com\boxalino\p13n\api\thrift\HitsGroup();
              $xfer += $elem149->read($input);
              $this->hitsGroups []= $elem149;
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
    $xfer += $output->writeStructBegin('SearchResult');
    if ($this->hits !== null) {
      if (!is_array($this->hits)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('hits', TType::LST, 1);
      {
        $output->writeListBegin(TType::STRUCT, count($this->hits));
        {
          foreach ($this->hits as $iter150)
          {
            $xfer += $iter150->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->facetResponses !== null) {
      if (!is_array($this->facetResponses)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('facetResponses', TType::LST, 2);
      {
        $output->writeListBegin(TType::STRUCT, count($this->facetResponses));
        {
          foreach ($this->facetResponses as $iter151)
          {
            $xfer += $iter151->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->totalHitCount !== null) {
      $xfer += $output->writeFieldBegin('totalHitCount', TType::I64, 3);
      $xfer += $output->writeI64($this->totalHitCount);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->queryText !== null) {
      $xfer += $output->writeFieldBegin('queryText', TType::STRING, 40);
      $xfer += $output->writeString($this->queryText);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->hitsGroups !== null) {
      if (!is_array($this->hitsGroups)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('hitsGroups', TType::LST, 50);
      {
        $output->writeListBegin(TType::STRUCT, count($this->hitsGroups));
        {
          foreach ($this->hitsGroups as $iter152)
          {
            $xfer += $iter152->write($output);
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