<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class SimpleSearchQuery {
  static $_TSPEC;

  /**
   * @var string
   */
  public $indexId = null;
  /**
   * @var string
   */
  public $language = null;
  /**
   * @var string
   */
  public $queryText = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\Filter[]
   */
  public $filters = null;
  /**
   * @var bool
   */
  public $orFilters = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\FacetRequest[]
   */
  public $facetRequests = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\SortField[]
   */
  public $sortFields = null;
  /**
   * @var int
   */
  public $offset = null;
  /**
   * @var int
   */
  public $hitCount = null;
  /**
   * @var string[]
   */
  public $returnFields = null;
  /**
   * @var string
   */
  public $groupBy = null;
  /**
   * @var bool
   */
  public $groupFacets = true;
  /**
   * @var int
   */
  public $groupItemsCount = 1;
  /**
   * @var string
   */
  public $groupItemsSort = "score";
  /**
   * @var bool
   */
  public $groupItemsSortAscending = false;
  /**
   * @var bool
   */
  public $hitsGroupsAsHits = false;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'indexId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'language',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'queryText',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'filters',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\Filter',
            ),
          ),
        5 => array(
          'var' => 'orFilters',
          'type' => TType::BOOL,
          ),
        6 => array(
          'var' => 'facetRequests',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\FacetRequest',
            ),
          ),
        7 => array(
          'var' => 'sortFields',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\SortField',
            ),
          ),
        8 => array(
          'var' => 'offset',
          'type' => TType::I64,
          ),
        9 => array(
          'var' => 'hitCount',
          'type' => TType::I32,
          ),
        10 => array(
          'var' => 'returnFields',
          'type' => TType::LST,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        20 => array(
          'var' => 'groupBy',
          'type' => TType::STRING,
          ),
        30 => array(
          'var' => 'groupFacets',
          'type' => TType::BOOL,
          ),
        40 => array(
          'var' => 'groupItemsCount',
          'type' => TType::I32,
          ),
        50 => array(
          'var' => 'groupItemsSort',
          'type' => TType::STRING,
          ),
        60 => array(
          'var' => 'groupItemsSortAscending',
          'type' => TType::BOOL,
          ),
        70 => array(
          'var' => 'hitsGroupsAsHits',
          'type' => TType::BOOL,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['indexId'])) {
        $this->indexId = $vals['indexId'];
      }
      if (isset($vals['language'])) {
        $this->language = $vals['language'];
      }
      if (isset($vals['queryText'])) {
        $this->queryText = $vals['queryText'];
      }
      if (isset($vals['filters'])) {
        $this->filters = $vals['filters'];
      }
      if (isset($vals['orFilters'])) {
        $this->orFilters = $vals['orFilters'];
      }
      if (isset($vals['facetRequests'])) {
        $this->facetRequests = $vals['facetRequests'];
      }
      if (isset($vals['sortFields'])) {
        $this->sortFields = $vals['sortFields'];
      }
      if (isset($vals['offset'])) {
        $this->offset = $vals['offset'];
      }
      if (isset($vals['hitCount'])) {
        $this->hitCount = $vals['hitCount'];
      }
      if (isset($vals['returnFields'])) {
        $this->returnFields = $vals['returnFields'];
      }
      if (isset($vals['groupBy'])) {
        $this->groupBy = $vals['groupBy'];
      }
      if (isset($vals['groupFacets'])) {
        $this->groupFacets = $vals['groupFacets'];
      }
      if (isset($vals['groupItemsCount'])) {
        $this->groupItemsCount = $vals['groupItemsCount'];
      }
      if (isset($vals['groupItemsSort'])) {
        $this->groupItemsSort = $vals['groupItemsSort'];
      }
      if (isset($vals['groupItemsSortAscending'])) {
        $this->groupItemsSortAscending = $vals['groupItemsSortAscending'];
      }
      if (isset($vals['hitsGroupsAsHits'])) {
        $this->hitsGroupsAsHits = $vals['hitsGroupsAsHits'];
      }
    }
  }

  public function getName() {
    return 'SimpleSearchQuery';
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
            $xfer += $input->readString($this->indexId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->language);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->queryText);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::LST) {
            $this->filters = array();
            $_size28 = 0;
            $_etype31 = 0;
            $xfer += $input->readListBegin($_etype31, $_size28);
            for ($_i32 = 0; $_i32 < $_size28; ++$_i32)
            {
              $elem33 = null;
              $elem33 = new \com\boxalino\p13n\api\thrift\Filter();
              $xfer += $elem33->read($input);
              $this->filters []= $elem33;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->orFilters);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::LST) {
            $this->facetRequests = array();
            $_size34 = 0;
            $_etype37 = 0;
            $xfer += $input->readListBegin($_etype37, $_size34);
            for ($_i38 = 0; $_i38 < $_size34; ++$_i38)
            {
              $elem39 = null;
              $elem39 = new \com\boxalino\p13n\api\thrift\FacetRequest();
              $xfer += $elem39->read($input);
              $this->facetRequests []= $elem39;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::LST) {
            $this->sortFields = array();
            $_size40 = 0;
            $_etype43 = 0;
            $xfer += $input->readListBegin($_etype43, $_size40);
            for ($_i44 = 0; $_i44 < $_size40; ++$_i44)
            {
              $elem45 = null;
              $elem45 = new \com\boxalino\p13n\api\thrift\SortField();
              $xfer += $elem45->read($input);
              $this->sortFields []= $elem45;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->offset);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 9:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->hitCount);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 10:
          if ($ftype == TType::LST) {
            $this->returnFields = array();
            $_size46 = 0;
            $_etype49 = 0;
            $xfer += $input->readListBegin($_etype49, $_size46);
            for ($_i50 = 0; $_i50 < $_size46; ++$_i50)
            {
              $elem51 = null;
              $xfer += $input->readString($elem51);
              $this->returnFields []= $elem51;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 20:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->groupBy);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 30:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->groupFacets);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 40:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->groupItemsCount);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 50:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->groupItemsSort);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 60:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->groupItemsSortAscending);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 70:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->hitsGroupsAsHits);
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
    $xfer += $output->writeStructBegin('SimpleSearchQuery');
    if ($this->indexId !== null) {
      $xfer += $output->writeFieldBegin('indexId', TType::STRING, 1);
      $xfer += $output->writeString($this->indexId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->language !== null) {
      $xfer += $output->writeFieldBegin('language', TType::STRING, 2);
      $xfer += $output->writeString($this->language);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->queryText !== null) {
      $xfer += $output->writeFieldBegin('queryText', TType::STRING, 3);
      $xfer += $output->writeString($this->queryText);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->filters !== null) {
      if (!is_array($this->filters)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('filters', TType::LST, 4);
      {
        $output->writeListBegin(TType::STRUCT, count($this->filters));
        {
          foreach ($this->filters as $iter52)
          {
            $xfer += $iter52->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->orFilters !== null) {
      $xfer += $output->writeFieldBegin('orFilters', TType::BOOL, 5);
      $xfer += $output->writeBool($this->orFilters);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->facetRequests !== null) {
      if (!is_array($this->facetRequests)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('facetRequests', TType::LST, 6);
      {
        $output->writeListBegin(TType::STRUCT, count($this->facetRequests));
        {
          foreach ($this->facetRequests as $iter53)
          {
            $xfer += $iter53->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->sortFields !== null) {
      if (!is_array($this->sortFields)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('sortFields', TType::LST, 7);
      {
        $output->writeListBegin(TType::STRUCT, count($this->sortFields));
        {
          foreach ($this->sortFields as $iter54)
          {
            $xfer += $iter54->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->offset !== null) {
      $xfer += $output->writeFieldBegin('offset', TType::I64, 8);
      $xfer += $output->writeI64($this->offset);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->hitCount !== null) {
      $xfer += $output->writeFieldBegin('hitCount', TType::I32, 9);
      $xfer += $output->writeI32($this->hitCount);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->returnFields !== null) {
      if (!is_array($this->returnFields)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('returnFields', TType::LST, 10);
      {
        $output->writeListBegin(TType::STRING, count($this->returnFields));
        {
          foreach ($this->returnFields as $iter55)
          {
            $xfer += $output->writeString($iter55);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupBy !== null) {
      $xfer += $output->writeFieldBegin('groupBy', TType::STRING, 20);
      $xfer += $output->writeString($this->groupBy);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupFacets !== null) {
      $xfer += $output->writeFieldBegin('groupFacets', TType::BOOL, 30);
      $xfer += $output->writeBool($this->groupFacets);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupItemsCount !== null) {
      $xfer += $output->writeFieldBegin('groupItemsCount', TType::I32, 40);
      $xfer += $output->writeI32($this->groupItemsCount);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupItemsSort !== null) {
      $xfer += $output->writeFieldBegin('groupItemsSort', TType::STRING, 50);
      $xfer += $output->writeString($this->groupItemsSort);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupItemsSortAscending !== null) {
      $xfer += $output->writeFieldBegin('groupItemsSortAscending', TType::BOOL, 60);
      $xfer += $output->writeBool($this->groupItemsSortAscending);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->hitsGroupsAsHits !== null) {
      $xfer += $output->writeFieldBegin('hitsGroupsAsHits', TType::BOOL, 70);
      $xfer += $output->writeBool($this->hitsGroupsAsHits);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}