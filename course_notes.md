# OOP in PHP

## Basic OOP

### Method and property visibility

- public: Accessible outside of class

- protected: Accessible in class and any extended classes

- private: Accessible ONLY in the owner class

### Instantiate and use a class

Create an instance

```php
$classinst = new MyClass();
```

Example of class usage and definition

```php
<?php

// Define the class and the methods
class User {
    // Initialization of class properties are here
    // Call for the parent's constructor(s) (if any) also go(es) here
    public function __construct() {
        echo 'Constructor called.';
    }

    public function register() {
        echo 'User registered';
    }

    public function login($username, $password) {
        $this->auth_user($username, $password);
        echo $username . 'is logged in.';
    }

    public function auth_user($username, $password) {
        echo $username . ' is authenticated';
    }

    // Destructor syntax
    public function __destruct() {
        // put code here to free resources, close files, ect.
        // close databases for example
        echo 'Destructor called.';
    }
}

// Instantiate
$user = new User;

// Method call examples
$user->register();
$user->login('user1', 'userpass');
```

### Class properties and access modifiers

```php
class User {
    private $id = 33;
    private $username;
    private $email;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function login($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->auth_user();
    }

    public function auth_user() {
        echo $this->username . ' is authenticated';
    }
}

$user = new User('testuser', 'pass');
```

### Getters and Setters

```php
<?php
class Post {
    private $name;

    public function __set($name, $value) {
        echo 'Setting '.$name.' to <strong>'.$value.'</strong><br/>';
        $this->name = $value;
    }

    public function __get($name) {
        echo 'Getting '.$name.'<br/>';
        return $this->name;
    }

    public function __isset($name) {
        echo 'Is '.$name.' set?';
        return isset($this->name);
    }
}

$post = new Post;
$post->name = 'Testing';
echo $post->name;
var_dump(isset($post->name));
```

### Class inheritance

```php
<?php

class First {
    public $id = 23;
    public $name = 'John Doe';
    private $test = false;

    public function saySomething() {
        echo 'Something...';
    }
}

class Second extends First {
    public function getName() {
        return $this->name;
    }
}

$second = new Second;

// Example calls from the Second class inherited properties
echo $second->name;
echo $second->saySomething();
echo $second->test; // error! private property
echo $second->getName(); // ok## Advanced OOP
```

## Advanced OOP

### Static properties and methods

```php
<?php

class User {
    public $username;
    public static $minPassLength = 5;

    public static function validatePassword($password) {
        if (strlen($password) >= self::$minPassLength) {
            return true;
        } else {
            return false;
        }
    }
}

$password = 'pass';
if (User::validatePassword($password)) {
    echo 'Password is valid';
} else {
    echo 'Password is not valid';
}

echo User::$minPassLength;
```

### Abstract classes and methods

The abstract class is a base class and you cannot instantiate an abstract class. You have to extend them and use the inherited classes.

```php
<?php

abstract class Animal {
    public $name;
    public $color;

    public function describe() {
        return $this->name.' is '.$this->color;
    }
}

class Duck extends Animal {
    public function describe() {
        return parent::describe();
    }

    public function makeSound() {
        return 'Quack';
    }
}

class Dog extends Animal {
    public function makeSound() {
        return 'Bark';
    }
}

$animal = new Duck();
$animal->name = 'Ben';
$animal->color = 'Yellow';
echo $animal->describe();
echo $animal->makeSound();
```

### Class autoloading

First file: foo.php

```php
<?php
class Foo {
  public function sayHello() {
     echo 'Hello world';
  }
}
?>
```

Second file: bar.php

```php
<?php
class Bar {
  public function sayHello() {
     echo 'Hello world from Bar';
  }
}
?>
```

Another file: index.php

```php
<?php
//include 'foo.php';
//include 'bar.php';
spl_autoload_register(function($class_name) {
  include $class_name . '.php';
});

$foo = new Foo;
$bar = new Bar;

$foo->sayHello();
```

### final keyword

You can use this keyword to disable overloading a class or a method.

```php
class Foo {
  final public function() {
  }
}

final class Bar {
}
```

### Object iteration

$person4 and $person5 is unreachable outside the class but we can define a function _iterateObject()_ to reach all internal variables.
```php
<?php

class People {
    public $person1 = 'Mike';
    public $person2 = 'Shelly';
    public $person3 = 'Jeff';

    protected $person4 = 'John';
    private   $person4 = 'Jen';

    public function itaretObject()
    {
        foreach ($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}

$people = new People;
$people->iterateObject();
```

## Database handling with PDO

### PDO Database: class & Connection

See classes/Database.php as an example.

### PDO Database: bind parameters and fetch the data

See classes/Database.php : query(), bind(), execute() and resultset() functions.

PHP foreach inside HTML
```php
<?php foreach($rows as $row) : ?>
    <div>
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['body']; ?></p>
    </div>
<?php endforeach; ?>
```
