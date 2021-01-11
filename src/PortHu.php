<?php

namespace Attus\PortHu;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Attus\PortHu\Exception\PortHuException;

/**
 * Port.Hu API
 *
 * @author Attila Németh
 * 11.01.2021
 */
class PortHu {
  
  // API Base URL
  private     $_baseUrl           = 'https://port.hu/tvapi';
  
  // Channels to Get
  private     $_channels          = [];
  
  // Date to Get in YYYY-MM-DD Format
  private     $_date;
  
  public function __construct() {
    $this->_date = date('Y-m-d');
  }
  
  /**
   * Set the channels
   * @param array $channelIds
   * @return void
   */
  public function setChannels(array $channelIds): void
  {
    $this->_channels = $channelIds;
  }
  
  /**
   * Add a channel
   * @param int $channelId
   * @return void
   */
  public function addChannel(int $channelId): void
  {
    $this->_channels[$channelId] = $channelId;
  }
  
  /**
   * Set the date in UNIX Timestamp Format
   * @param int $timestamp
   * @return void
   */
  public function setTimestamp(int $timestamp): void
  {
    $this->_date = date('Y-m-d', $timestamp);
  }
  
  /**
   * TV Program
   * @return array
   */
  public function getProgram(): object
  {
    try {
      $client = new Client();
      $response = $client->get($this->_baseUrl, [
        'query' => $this->_getQuery(),
      ]);
      $result = json_decode((string)$response->getBody());
      return $result;
    } 
    catch (ConnectException $ex) {
      throw new PortHuException($ex->getMessage());
    }
  }
  
  /**
   * The GET Query for Port.hu Request
   * @return array
   */
  private function _getQuery(): array
  {
    $query = [
      'channel_id'        => [],
      'date'              => $this->_date,
    ];
    foreach($this->_channels as $channelId) {
      $query['channel_id'][] = 'tvchannel-' . $channelId;
    }
    return $query;
  }
  
}
