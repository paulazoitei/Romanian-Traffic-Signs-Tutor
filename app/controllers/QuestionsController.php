<?php
class QuestionsController extends Controller
{
    public function index()
    {
        $questionModel = $this->model('Question');
        $questions = $questionModel->getAllQuestions();
        echo json_encode($questions);
    }

    public function create()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        // Validare simplă a datelor - poți adăuga validări mai robuste în funcție de necesități

        $text = $data['text'];
        $variant_1 = $data['variant_1'];
        $variant_2 = $data['variant_2'];
        $variant_3 = $data['variant_3'];
        $correct_1 = $data['correct_1'];
        $correct_2 = $data['correct_2'];
        $correct_3 = $data['correct_3'];
        $image_url = $data['image_url'];

        $questionModel = $this->model('Question');
        $result = $questionModel->addQuestion($text, $variant_1, $variant_2, $variant_3, $correct_1, $correct_2, $correct_3, $image_url);

        if ($result) {
            http_response_code(201); // Created
            echo json_encode(array("message" => "Question created successfully."));
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(array("message" => "Unable to create question."));
        }
    }
}
?>
