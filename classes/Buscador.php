<?php
// Esta línea asegura que se utilicen tipos estrictos en el archivo
declare(strict_types=1);

class Buscador
{
    // Constantes
    private const API_KEY = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    private const API_URL = "https://api.themoviedb.org/3/search/movie";
    private const API_LANG = "&language=es-AR&include_image_language=es,null";

    // Variables
    public array $resultados = [];
    public array $data = [];
    public int $total_pages = 1;
    public int $page = 1;

    // Constructor
    public function __construct(public string $query = '', int $page = 1)
    {
        $this->page = $page;
        if (!empty($this->query)) {
            $this->fetch_data();
        }
    }

    // Este método privado obtiene los datos de la API.
    private function fetch_data(): void
    {
        $api_url = self::API_URL . '?query=' . urlencode($this->query) . '&api_key=' . self::API_KEY . self::API_LANG . '&page=' . $this->page;
        $this->data = $this->get_data($api_url);

        # Verificar si hay resultados
        if (isset($this->data['results']) && !empty($this->data['results'])) {
            $this->resultados = $this->data['results'];
        }

        # Verificar el número total de páginas
        if (isset($this->data['total_pages'])) {
            $this->total_pages = $this->data['total_pages'];
        }

        // var_dump($this->data);
    }

    // Este método privado obtiene los datos de la URL de la API proporcionada.
    private function get_data(string $api_url): array
    {
        $response = file_get_contents($api_url);
        return json_decode($response, true);
    }

    // Este método estático renderiza una plantilla PHP.
    public static function render_template(string $template, array $data = []): void
    {
        extract($data);
        require "templates/$template.php";
    }

}

?>