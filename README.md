# php-serializable
this helps to serialize php object
## how to
to use it call the static method called serilaizable which will take in the obect as parameter. see example below

 
    
    $user = new User();
    $user->setFirstname("Theophilus");
    $user->setLastname("Omoregbee");

    $user->setStates(array(new State("Edo state", "ED"), new State("Lagos State", "LG")));
    $user->setCountry(new Country("Nigeria","NG"));

    $user->setRoles(array("ADMIN","DB MANAGER"));

    $user->setEmail("theo4u@ymail.com");
    $user->setPassword("1111");

    //lets serialize our object now
    echo json_encode(SerializeMe::serialize($user));


which will lead to this output 
`{"firstname":"Theophilus","lastname":"Omoregbee","states":[{"name":"Edo state","code":"ED"},{"name":"Lagos State","code":"LG"}],"country":{"name":"Nigeria","code":"NG"},"dateCreated":1477351778,"roles":["ADMIN","DB MANAGER"],"email":"theo4u@ymail.com","password":"b59c67bf196a4758191e42f76670ceba"}`

![Response Json](https://github.com/theo4u/php-serializable/raw/master/serializable.png)


## Contributions 
Allow contributions to make it faster and re-usable
