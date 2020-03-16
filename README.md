# brawlhalla-api-bundle
[![SymfonyInsight](https://insight.symfony.com/projects/100ff684-17fc-4678-9aee-aab30e261b70/big.svg)](https://insight.symfony.com/projects/100ff684-17fc-4678-9aee-aab30e261b70)

Symfony wrapper for Brawlhalla API

## Installation

Create `brawlhalla_api_bundle.yaml` with the following

```yaml
brawlhalla_api:
  api_key: '%env(BRAWL_API_KEY)%'
```

In your `.env.local` the dev key

```
###> dylandelobel/brawlhalla-api-bundle ###
BRAWL_API_KEY=xxx
###< dylandelobel/brawlhalla-api-bundle ###
```

Require the package
```
composer require dylandelobel/brawlhalla-api-bundle
```
## Usage

```php
    public function brawl(BrawlhallaClient $brawlhallaClient)
    {
        $request = $brawlhallaClient->getClan(1);
        $json = json_decode($request->getBody());

        return new JsonResponse($json);
    }
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
