foreach ($articles as $article) {
    unset($article->generated_html);
}
echo json_encode(compact('articles'));