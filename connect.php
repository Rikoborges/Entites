<?php
class Connect {
    private static ?PDO $pdo = null;

    public static function connect(): PDO {
        if (self::$pdo === null) {
            $config = parse_ini_file(__DIR__ . '/conf/config.conf');


            if (!$config) {
                die("Erro ao ler config.conf");
            }

            $host = $config['host'];
            $port = $config['port'];
            $db = $config['db'];
            $user = $config['user'];
            $mdp = $config['mdp'];
            $charset = $config['charset'];

            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

            try {
                self::$pdo = new PDO($dsn, $user, $mdp, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]);
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
