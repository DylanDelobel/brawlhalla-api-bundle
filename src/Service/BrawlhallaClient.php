<?php

namespace DylanDelobel\BrawlhallaApiBundle\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class BrawlhallaClient
{

    private $logger;

    private $client;

    private $api_key;

    public function __construct($api_key, LoggerInterface $logger= null)
    {
        $this->logger = $logger;
        $this->client = new Client();
        $this->api_key = '?api_key='.$api_key;
    }

    /**
     * @param int $steam_id
     * @return mixed|string
     */
    public function searchBySteamId(int $steam_id): ?ResponseInterface
    {
        try
        {
            $request = $this->client->request('GET',
                'https://api.brawlhalla.com/search?steamid=' . $steam_id . $this->api_key);
        }
        catch (GuzzleException $e)
        {
            $this->logger->error('Method searchBySteamId fail');
        }
        return $request ?? null;
    }

    /**
     * @param string $bracket
     * @param string $region
     * @param int $page
     * @return mixed|string
     */
    public function getRankings(string $bracket, string $region, int $page = 1): ?ResponseInterface
    {
        try
        {
            $request = $this->client->request('GET',
                'https://api.brawlhalla.com/rankings/' . $bracket . '/' . $region . '/' . $page . $this->api_key);
        }
        catch (GuzzleException $e)
        {
            $this->logger->error('Method getRankings fail');
        }
        return $request ?? null;
    }

    /**
     * @param int $brawlhalla_id
     * @return mixed|string
     */
    public function getPlayerStats(int $brawlhalla_id): ?ResponseInterface
    {
        try
        {
            $request = $this->client->request('GET',
                'https://api.brawlhalla.com/player/' . $brawlhalla_id . '/stats' . $this->api_key);
        }
        catch (GuzzleException $e)
        {
            $this->logger->error('Method getPlayerStats fail');
        }
        return $request ?? null;
    }

    /**
     * @param int $brawlhalla_id
     * @return mixed|string
     */
    public function getPlayerRanked(int $brawlhalla_id): ?ResponseInterface
    {
        try
        {
            $request = $this->client->request('GET',
                'https://api.brawlhalla.com/player/' . $brawlhalla_id . '/ranked' . $this->api_key);
        }
        catch (GuzzleException $e)
        {
            $this->logger->error('Method getPlayerRanked fail');
        }
        return $request ?? null;
    }

    /**
     * @param int $clan_id
     * @return mixed|string
     * @throws \HttpException
     */
    public function getClan(int $clan_id): ?ResponseInterface
    {
        try
        {
            $request = $this->client->request('GET',
                'https://api.brawlhalla.com/clan/' . $clan_id . $this->api_key);
        }
        catch (GuzzleException $e)
        {
            throw new \HttpException('Method getClan fail', 500);
        }
        return $request ?? null;
    }

    /**
     * @return mixed|string
     */
    public function getLegends(): ?ResponseInterface
    {
        try
        {
            $request = $this->client->request('GET',
                'https://api.brawlhalla.com/legend/all' . $this->api_key);
        }
        catch (GuzzleException $e)
        {
            $this->logger->error('Method getLegends fail');
        }
        return $request ?? null;
    }

    /**
     * @param $legend_id
     * @return mixed|string
     */
    public function getLegend(int $legend_id): ?ResponseInterface
    {
        try
        {
            $request = $this->client->request('GET',
                'https://api.brawlhalla.com/legend/' . $legend_id . $this->api_key);
        }
        catch (GuzzleException $e)
        {
            $this->logger->error('Method getLegend fail');
        }
        return $request ?? null;
    }
}
