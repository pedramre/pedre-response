# PedreResponse

It's very important to use same structure for responses in large projects that **PedreResponse** package do it.

PedreResponse is a starndard json response structure.

## Installation

Use the package manager [composer](https://getcomposer.org) to install PedreResponse.

```bash
composer require pedre/response
```

## Usage

```php
  $response = new Response();

  // set boolean 'success'. It's optional (default is true)
  $response->setSuccess();

  // set array 'data'. It's optional (default is empty array)
  $response->setData();

  // set array 'message'. It's optional (default is empty string)
  $response->setMessage();

  // set integer 'error_code'. It's optional
  $response->setErrorCode();

  // set integer 'status'. It's optional (default is 200)
  $response->setStatus();

  // send json response. It's required
  $response->send();
```

## Full Example

```php
use Pedre\Response\Response;

class UserController extends Controller
{
   public function login(Request $request,Response $response){
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return  $response->setSuccess(false)
                ->setMessage('Please Enter Valid Character')
                ->serErrorCode(400)
                ->setData(['errorMessages'=>$validator->messages()])
                ->send();
        }

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']],'web')) {
            return  $response->setMessage('Successful Login, Congratulations !!!')->send();
        }
        else{
            return  $response->setSuccess(false)
                ->setMessage('There is not any user, Please register')
                ->send();
        }

   }
}

```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
