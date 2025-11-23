<?php
// ==================== SCRIPT DE TEST DE CONFIGURATION ====================
// Testez ce fichier pour vérifier que tout fonctionne
// URL: http://localhost/runtrack3/jour04/job04/test_config.php

echo "<!DOCTYPE html>";
echo "<html lang='fr'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Test Configuration - Job04</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }";
echo ".test-section { background: white; padding: 20px; margin: 10px 0; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }";
echo ".success { color: #28a745; }";
echo ".error { color: #dc3545; }";
echo ".warning { color: #ffc107; }";
echo ".info { color: #17a2b8; }";
echo "pre { background: #f8f9fa; padding: 10px; border-radius: 3px; overflow-x: auto; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1> Test de Configuration - Jour04 Job04</h1>";

// ==================== TEST 1: Configuration PHP ====================
echo "<div class='test-section'>";
echo "<h2> 1. Configuration PHP</h2>";

echo "<p><strong>Version PHP:</strong> <span class='info'>" . phpversion() . "</span></p>";
echo "<p><strong>Extensions requises:</strong></p>";
echo "<ul>";

// Test PDO
if (extension_loaded('pdo')) {
    echo "<li class='success'> PDO: Disponible</li>";
} else {
    echo "<li class='error'> PDO: Non disponible (REQUIS)</li>";
}

// Test PDO MySQL
if (extension_loaded('pdo_mysql')) {
    echo "<li class='success'> PDO MySQL: Disponible</li>";
} else {
    echo "<li class='error'> PDO MySQL: Non disponible (REQUIS)</li>";
}

// Test JSON
if (extension_loaded('json')) {
    echo "<li class='success'> JSON: Disponible</li>";
} else {
    echo "<li class='error'> JSON: Non disponible (REQUIS)</li>";
}

echo "</ul>";
echo "</div>";

// ==================== TEST 2: Connexion Base de Données ====================
echo "<div class='test-section'>";
echo "<h2> 2. Test de Connexion à la Base de Données</h2>";

$db_config = [
    'host' => 'localhost',
    'dbname' => 'utilisateurs',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
];

try {
    $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
    $pdo = new PDO($dsn, $db_config['username'], $db_config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    echo "<p class='success'> Connexion à la base de données réussie</p>";
    
    // Test existence de la table
    $stmt = $pdo->query("SHOW TABLES LIKE 'utilisateurs'");
    if ($stmt->rowCount() > 0) {
        echo "<p class='success'> Table 'utilisateurs' trouvée</p>";
        
        // Test structure de la table
        $stmt = $pdo->query("DESCRIBE utilisateurs");
        $columns = $stmt->fetchAll();
        
        echo "<p><strong>Structure de la table:</strong></p>";
        echo "<pre>";
        foreach ($columns as $column) {
            echo sprintf("%-15s %-20s %s\n", 
                $column['Field'], 
                $column['Type'], 
                $column['Null'] === 'NO' ? 'NOT NULL' : 'NULL'
            );
        }
        echo "</pre>";
        
        // Test données
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM utilisateurs");
        $result = $stmt->fetch();
        $count = $result['count'];
        
        if ($count > 0) {
            echo "<p class='success'> {$count} utilisateur(s) trouvé(s) dans la base</p>";
            
            // Afficher quelques exemples
            $stmt = $pdo->query("SELECT * FROM utilisateurs LIMIT 3");
            $users = $stmt->fetchAll();
            
            echo "<p><strong>Exemples d'utilisateurs:</strong></p>";
            echo "<pre>";
            foreach ($users as $user) {
                echo "ID: {$user['id']} | {$user['prenom']} {$user['nom']} | {$user['email']}\n";
            }
            echo "</pre>";
        } else {
            echo "<p class='warning'> Aucun utilisateur dans la base (normal si c'est la première installation)</p>";
            echo "<p class='info'> Exécutez le script database.sql pour ajouter des données de test</p>";
        }
        
    } else {
        echo "<p class='error'> Table 'utilisateurs' non trouvée</p>";
        echo "<p class='info'> Exécutez le script database.sql dans phpMyAdmin</p>";
    }
    
} catch (PDOException $e) {
    echo "<p class='error'> Erreur de connexion: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p class='info'> Vérifications à faire:</p>";
    echo "<ul>";
    echo "<li>WAMP est-il démarré ?</li>";
    echo "<li>MySQL est-il actif (icône verte) ?</li>";
    echo "<li>La base 'utilisateurs' existe-t-elle ?</li>";
    echo "<li>Les paramètres de connexion sont-ils corrects ?</li>";
    echo "</ul>";
}

echo "</div>";

// ==================== TEST 3: Test de l'API ====================
echo "<div class='test-section'>";
echo "<h2> 3. Test de l'API</h2>";

$api_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/users.php';
echo "<p><strong>URL de l'API:</strong> <a href='{$api_url}' target='_blank'>{$api_url}</a></p>";

// Test basique avec file_get_contents
$context = stream_context_create([
    'http' => [
        'timeout' => 10,
        'method' => 'GET'
    ]
]);

try {
    $api_response = @file_get_contents($api_url, false, $context);
    
    if ($api_response !== false) {
        $json_data = json_decode($api_response, true);
        
        if ($json_data !== null) {
            echo "<p class='success'> API répond correctement</p>";
            echo "<p><strong>Réponse JSON:</strong></p>";
            echo "<pre>" . htmlspecialchars(json_encode($json_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) . "</pre>";
        } else {
            echo "<p class='error'> Réponse API invalide (JSON malformé)</p>";
            echo "<p><strong>Réponse brute:</strong></p>";
            echo "<pre>" . htmlspecialchars($api_response) . "</pre>";
        }
    } else {
        echo "<p class='error'> Impossible d'accéder à l'API</p>";
        echo "<p class='info'> Vérifiez que le fichier users.php existe et est accessible</p>";
    }
} catch (Exception $e) {
    echo "<p class='error'> Erreur lors du test API: " . htmlspecialchars($e->getMessage()) . "</p>";
}

echo "</div>";

// ==================== TEST 4: Fichiers Required ====================
echo "<div class='test-section'>";
echo "<h2> 4. Vérification des Fichiers</h2>";

$required_files = [
    'index.php' => 'Interface utilisateur',
    'users.php' => 'API PHP',
    'database.sql' => 'Script de base de données',
    'README.md' => 'Documentation'
];

foreach ($required_files as $file => $description) {
    if (file_exists($file)) {
        echo "<p class='success'> {$file} - {$description}</p>";
    } else {
        echo "<p class='error'> {$file} - {$description} (MANQUANT)</p>";
    }
}

echo "</div>";

// ==================== RÉSUMÉ ====================
echo "<div class='test-section'>";
echo "<h2> 5. Résumé et Actions</h2>";

echo "<p><strong>Si tous les tests sont verts:</strong></p>";
echo "<ol>";
echo "<li>Ouvrez <a href='index.php'>index.php</a> pour utiliser l'application</li>";
echo "<li>Testez l'API directement: <a href='users.php' target='_blank'>users.php</a></li>";
echo "<li>Ajoutez/supprimez des utilisateurs via phpMyAdmin et testez la mise à jour</li>";
echo "</ol>";

echo "<p><strong>Si des tests échouent:</strong></p>";
echo "<ol>";
echo "<li>Vérifiez que WAMP est complètement démarré</li>";
echo "<li>Exécutez le script database.sql dans phpMyAdmin</li>";
echo "<li>Vérifiez les paramètres de connexion dans users.php</li>";
echo "<li>Consultez les logs Apache/PHP</li>";
echo "</ol>";

echo "<p class='info'> <strong>Conseil:</strong> Gardez cette page ouverte pour diagnostiquer rapidement les problèmes</p>";

echo "</div>";

echo "</body></html>";
?>