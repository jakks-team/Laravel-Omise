# Laravel Omise

# Docs
[Documentation Omise](https://www.omise.co/docs)  

# Support
<table>
   <thead>
      <tr>
         <th>Laravel</th>
         <th>Version</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>7.x</td>
         <td>dev-master</td>
      </tr>
   </tbody>
</table>

# Let's Start

Install via composer
```
composer require wenhaokho/omise
```

Bring the config file to the project.
```
php artisan vendor:publish --tag=config
```

Set the value at the .env file.
```
OMISE_PUBLIC_KEY=
OMISE_SECRET_KEY=
```

Create Paynow [Read More](https://www.omise.co/paynow)
```
$response = OmiseSource::create([
   'amount' => 100,
   'currency' => 'SGD',
   'type' => 'paynow',
   'phone_number' => '0123456789',
]);
dd($response);
```
