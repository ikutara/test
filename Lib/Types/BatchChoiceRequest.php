<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class BatchChoiceRequest {
  static $_TSPEC;

  /**
   * @var \com\boxalino\p13n\api\thrift\UserRecord
   */
  public $userRecord = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\ChoiceInquiry
   */
  public $choiceInquiry = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\RequestContext
   */
  public $requestContext = null;
  /**
   * @var string[]
   */
  public $profileIds = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\ChoiceInquiry[]
   */
  public $choiceInquiries = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\ProfileContext[]
   */
  public $profileContexts = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'userRecord',
          'type' => TType::STRUCT,
          'class' => '\com\boxalino\p13n\api\thrift\UserRecord',
          ),
        2 => array(
          'var' => 'choiceInquiry',
          'type' => TType::STRUCT,
          'class' => '\com\boxalino\p13n\api\thrift\ChoiceInquiry',
          ),
        3 => array(
          'var' => 'requestContext',
          'type' => TType::STRUCT,
          'class' => '\com\boxalino\p13n\api\thrift\RequestContext',
          ),
        4 => array(
          'var' => 'profileIds',
          'type' => TType::LST,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        5 => array(
          'var' => 'choiceInquiries',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\ChoiceInquiry',
            ),
          ),
        6 => array(
          'var' => 'profileContexts',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\ProfileContext',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['userRecord'])) {
        $this->userRecord = $vals['userRecord'];
      }
      if (isset($vals['choiceInquiry'])) {
        $this->choiceInquiry = $vals['choiceInquiry'];
      }
      if (isset($vals['requestContext'])) {
        $this->requestContext = $vals['requestContext'];
      }
      if (isset($vals['profileIds'])) {
        $this->profileIds = $vals['profileIds'];
      }
      if (isset($vals['choiceInquiries'])) {
        $this->choiceInquiries = $vals['choiceInquiries'];
      }
      if (isset($vals['profileContexts'])) {
        $this->profileContexts = $vals['profileContexts'];
      }
    }
  }

  public function getName() {
    return 'BatchChoiceRequest';
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
          if ($ftype == TType::STRUCT) {
            $this->userRecord = new \com\boxalino\p13n\api\thrift\UserRecord();
            $xfer += $this->userRecord->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->choiceInquiry = new \com\boxalino\p13n\api\thrift\ChoiceInquiry();
            $xfer += $this->choiceInquiry->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRUCT) {
            $this->requestContext = new \com\boxalino\p13n\api\thrift\RequestContext();
            $xfer += $this->requestContext->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::LST) {
            $this->profileIds = array();
            $_size181 = 0;
            $_etype184 = 0;
            $xfer += $input->readListBegin($_etype184, $_size181);
            for ($_i185 = 0; $_i185 < $_size181; ++$_i185)
            {
              $elem186 = null;
              $xfer += $input->readString($elem186);
              $this->profileIds []= $elem186;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::LST) {
            $this->choiceInquiries = array();
            $_size187 = 0;
            $_etype190 = 0;
            $xfer += $input->readListBegin($_etype190, $_size187);
            for ($_i191 = 0; $_i191 < $_size187; ++$_i191)
            {
              $elem192 = null;
              $elem192 = new \com\boxalino\p13n\api\thrift\ChoiceInquiry();
              $xfer += $elem192->read($input);
              $this->choiceInquiries []= $elem192;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::LST) {
            $this->profileContexts = array();
            $_size193 = 0;
            $_etype196 = 0;
            $xfer += $input->readListBegin($_etype196, $_size193);
            for ($_i197 = 0; $_i197 < $_size193; ++$_i197)
            {
              $elem198 = null;
              $elem198 = new \com\boxalino\p13n\api\thrift\ProfileContext();
              $xfer += $elem198->read($input);
              $this->profileContexts []= $elem198;
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
    $xfer += $output->writeStructBegin('BatchChoiceRequest');
    if ($this->userRecord !== null) {
      if (!is_object($this->userRecord)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('userRecord', TType::STRUCT, 1);
      $xfer += $this->userRecord->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->choiceInquiry !== null) {
      if (!is_object($this->choiceInquiry)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('choiceInquiry', TType::STRUCT, 2);
      $xfer += $this->choiceInquiry->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->requestContext !== null) {
      if (!is_object($this->requestContext)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('requestContext', TType::STRUCT, 3);
      $xfer += $this->requestContext->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->profileIds !== null) {
      if (!is_array($this->profileIds)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('profileIds', TType::LST, 4);
      {
        $output->writeListBegin(TType::STRING, count($this->profileIds));
        {
          foreach ($this->profileIds as $iter199)
          {
            $xfer += $output->writeString($iter199);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->choiceInquiries !== null) {
      if (!is_array($this->choiceInquiries)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('choiceInquiries', TType::LST, 5);
      {
        $output->writeListBegin(TType::STRUCT, count($this->choiceInquiries));
        {
          foreach ($this->choiceInquiries as $iter200)
          {
            $xfer += $iter200->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->profileContexts !== null) {
      if (!is_array($this->profileContexts)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('profileContexts', TType::LST, 6);
      {
        $output->writeListBegin(TType::STRUCT, count($this->profileContexts));
        {
          foreach ($this->profileContexts as $iter201)
          {
            $xfer += $iter201->write($output);
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