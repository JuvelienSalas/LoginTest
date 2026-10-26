department_id from both tables: departments and instructor
result=pgquery(conn, "SELECT * FROM users WHERE username = '$username'");
If someone types this as the username:
' OR '1'='1
if ($dbPassword === false || $dbPassword === '') { exit('Database password is not configured. Set SUPABASE_DB_PASSWORD in the PHP environment.'); }
$conn = pg_connect( 'host=' . (getenv('SUPABASE_DB_HOST') ?: 'db.fdpiddtxihemhdwllyjm.supabase.co') . ' port=' . (getenv('SUPABASE_DB_PORT') ?: '5432') . ' dbname=' . (getenv('SUPABASE_DB_NAME') ?: 'postgres') . ' user=' . (getenv('SUPABASE_DB_USER') ?: 'postgres') . ' password=' . $dbPassword . ' sslmode=require' );
if (!$conn) { exit('Database connection failed.'); }
<?php


$dbHost = 'aws-0-ap-northeast-1.pooler.supabase.com';
$dbUser = 'postgres.fdpiddtxihemhdwllyjm';
$dbPassword = 'hy64y2IglbyK8Ezf';


$conn = pg_connect("host=$dbHost port=5432 dbname=postgres user=$dbUser password=$dbPassword sslmode=require");


if (!$conn) {
    exit('Database connection failed.');
}








<?php


$local = file_exists(__DIR__ . '/config.local.php') ? require __DIR__ . '/config.local.php' : [];


$dbHost = getenv('SUPABASE_DB_HOST') ?: 'aws-0-ap-northeast-1.pooler.supabase.com';
$dbPort = getenv('SUPABASE_DB_PORT') ?: '5432';
$dbName = getenv('SUPABASE_DB_NAME') ?: 'postgres';
$dbUser = getenv('SUPABASE_DB_USER') ?: 'postgres.fdpiddtxihemhdwllyjm';
$dbPassword = getenv('SUPABASE_DB_PASSWORD') ?: ($local['SUPABASE_DB_PASSWORD'] ?? '');


$conn = pg_connect("host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword sslmode=require");


if (!$conn) {
    exit('Database connection failed.');
}
