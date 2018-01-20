<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\category;
use App\Filebook;
use App\Filelang;
use App\Filetype;
use App\Keyword;
use App\Outline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class LibraryCon extends Controller
{
    protected $obj;
    protected $objFileLang;
    protected $objFiletype;
    protected $objBook;


    public function __construct()
    {
        $this->obj = new category();
        $this->objFileLang = new Filelang();
        $this->objFiletype = new Filetype();
        $this->objBook = new Book();
    }


    //////////////      Admin      ///////////////////////////////////////////////////////////////////////////
    /*         Category       */
    public function index()
    {
        $allCat = $this->obj->getAllCategory();
        return view('admin.library.category', ['allCat' => $allCat]);
    }

    public function addCategory(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,name',
        ]);
//
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {

            $this->obj->addCategory($request->categoryName);
            return Redirect::back()->withSuccess('The adding is done');
        }

    }

    public function editCat(Request $request)
    {
        $id = $request->id_hidden;
        $name = $request->m_name;


        $validator = Validator::make($request->all(), [
            'm_name' => 'required|unique:categories,name,' . $id . ',id',
        ]);
        $attributeNames = array(
            'm_name' => 'category',

        );
        $validator->setAttributeNames($attributeNames);
        if ($validator->passes()) {
            $this->obj->editCat($id, $name);
            return response()->json(['success' => 'done']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function delCat(Request $request)
    {
        $id = $request->id_hiddenToDel;
        $a = $this->obj->delCat($id);
        if ($a) {
            echo "done";
        } else {
            echo "errro";
        }
    }

    /*   /////////////////////////////////////////////////////           */


    /*  Book */

    public function viewAddBook()
    {
        $getAllCat = $this->obj->getAllCategory();
        $getAllLang = $this->objFileLang->getAllLang();
        $getAllType = $this->objFiletype->getAllType();
        return view('admin.library.addBook', ['getAllCat' => $getAllCat, 'getAllLang' => $getAllLang, 'getAllType' => $getAllType]);
    }

    public function addBook(Request $request)
    {
        //echo $request->file->getClientOriginalName();

        $rules = [
            'nameBook' => 'required',
            'editionBook' => 'required|numeric|min:0',
            'summary' => 'required',
            'checkImgBook' => 'not_in:0',
            'selCatVal' => 'required',
            'datePublish' => 'required',
            'author' => 'required',
            'keyword' => 'required',
            'outline' => 'required',
            'checkDataLang' => 'not_in:0',
        ];

        $attributeNames = array(
            'checkDataLang' => 'Language fields',
            'checkImgBook' => 'image book'

        );

        $arrFileLengthToValidate = $request->arrFileLength;
        for ($i = 0; $i < $arrFileLengthToValidate; $i++) {
            $rules["arrFile" . $i] = 'mimes:pdf,doc,docx,pptx';
            $attributeNames["arrFile" . $i] = 'file';
        }


        $validator = Validator::make($request->all(), $rules, [
            'checkImgBook.not_in' => "The image book is required.",
            'checkDataLang.not_in' => "Language fields is required"
        ]);


        $validator->setAttributeNames($attributeNames);


        if ($validator->passes()) {

            $nameBook = $request->nameBook;
            $editionBook = $request->editionBook;
            $summary = $request->summary;
            $file = $request->file;
            $selCatVal = $request->selCatVal;
            $datePublish = $request->datePublish;

            $pathImgBook = $file->store('public/book/img');
            $bookIsNowAdded = $this->objBook->addBook($nameBook, $selCatVal, $editionBook, $summary, $pathImgBook, $datePublish);

            $author = explode(",", $request->author);
            $keyword = explode(",", $request->keyword);
            $outline = explode(",", $request->outline);

            $objAuthor = new Author();
            for ($i = 0; $i < count($author); $i++) {
                $objAuthor->addAuthor($bookIsNowAdded->id, $author[$i]);
            }


            $objKeyword = new Keyword();
            for ($i = 0; $i < count($keyword); $i++) {
                $objKeyword->addKeyword($bookIsNowAdded->id, $keyword[$i]);
            }

            $objOutline = new Outline();
            for ($i = 0; $i < count($outline); $i++) {
                $objOutline->addOutline($bookIsNowAdded->id, $outline[$i]);
            }


            $arrFileLength = $request->arrFileLength;
            $arrFileLangPath = [];

            for ($i = 0; $i < $arrFileLength; $i++) {
                $fileName = "arrFile" . $i;
                array_push($arrFileLangPath, $request->$fileName);
            }

            $fileType = explode(',', $request->arrTypeFile);
            $fileLang = explode(',', $request->arrLang);

            $bojFileBook = new Filebook();
            for ($j = 0; $j < count($arrFileLangPath); $j++) {

                $pathTypeFileLang = $arrFileLangPath[$j]->store('public/book/typeFile');
                $bojFileBook->addFileBook($bookIsNowAdded->id, $fileType[$j], $fileLang[$j], $pathTypeFileLang);
            }


            return response()->json(['success' => 1]);
        }
        return response()->json(['error' => $validator->errors()->all()]);

    }


    /* //////////////////////////////////////////////////    */


    /*     View book        */

    public function viewBook()
    {

        $getAllBook = $this->objBook->getAllBook();
        $allCat = $this->obj->getAllCategory();
        $getAllLang = $this->objFileLang->getAllLang();
        $getAllType = $this->objFiletype->getAllType();
        return view('admin.library.viewBook', ['getAllBook' => $getAllBook, 'allCat' => $allCat, 'getAllLang' => $getAllLang, 'getAllType' => $getAllType]);
    }

    public function editBook(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nameBook' => 'required',
            'editionBook' => 'required|numeric|min:0',
            'summaryBook' => 'required',
            'cat_id' => 'required',
            'publish' => 'required',
            'author' => 'required',
            'keyword' => 'required',
            'outline' => 'required',


        ]);


        if ($validator->passes()) {


            $id = $request->IdBook;
            $nameBook = $request->nameBook;
            $editionBook = $request->editionBook;
            $summary = $request->summaryBook;
            $file = $request->file;
            $selCatVal = $request->cat_id;
            $datePublish = $request->publish;
            $checkImgBook = $request->checkImgBook;


            $path = 0;
            if ($checkImgBook == 1) {
                $pathImgBook = $file->store('public/book/img');
                $this->objBook->updateBookWithImg($id, $nameBook, $selCatVal, $editionBook, $summary, $pathImgBook, $datePublish);
                $path = $pathImgBook;
            } else {
                $this->objBook->updateBookWithoutImg($id, $nameBook, $selCatVal, $editionBook, $summary, $datePublish);

            }


            $author = explode(",", $request->author);
            $keyword = explode(",", $request->keyword);
            $outline = explode(",", $request->outline);

            $objAuthor = new Author();
            $objAuthor->removeAuhtorBook($id);
            for ($i = 0; $i < count($author); $i++) {
                $objAuthor->addAuthor($id, $author[$i]);
            }


            $objKeyword = new Keyword();
            $objKeyword->removeKeywordBook($id);
            for ($i = 0; $i < count($keyword); $i++) {
                $objKeyword->addKeyword($id, $keyword[$i]);
            }

            $objOutline = new Outline();
            $objOutline->removeOutlineBook($id);
            for ($i = 0; $i < count($outline); $i++) {
                $objOutline->addOutline($id, $outline[$i]);
            }


            return response()->json(['success' => 1, 'path' => $path]);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function deleteBook(Request $request)
    {
        $idBook = $request->idBook;
        $this->objBook->deleteBook($idBook);

    }

    public function editFileTypeLang(Request $request)
    {

        $objFileBook = new Filebook();
        $objFileBook->updateFileBook($request->bookId, $request->typeId, $request->langId);
    }

    public function delFileDetail(Request $request)
    {
        $id = $request->fileBookIdInc;
        $objFileBook = new Filebook();
        $path = $objFileBook->getDataFileBook($id)->path;
        $newPath = str_replace('public/book/typeFile/', '', $path);
        File::Delete(public_path() . "/storage/book/typeFile/" . $newPath);
        $objFileBook->deleteFileBook($id);
    }

    public function getPlusData(Request $request)
    {


        $id = $request->idBook;

        $objFileBook = new Filebook();
        $objFileType = new Filetype();
        $objFileLang = new Filelang();


        echo json_encode(['fileBook' => $objFileBook->getAllType($id), 'fileType' => $objFileType->getAllType(), 'fileLang' => $objFileLang->getAllLang()]);

    }


    public function addNewFileBookPlus(Request $request)
    {
        $arrLang = explode(',', $request->lang);
        $arrType = explode(',', $request->type);
        $File = explode(',', $request->file);

        $arrFile = [];
        $num = $request->f;

        for ($i = 0; $i < $num; $i++) {
            $fileIndex = "file" . $i;
            array_push($arrFile, $request->$fileIndex);
        }

        $rules = [];
        for ($i = 0; $i < count($arrFile); $i++) {
            $rule['file' . $i] = 'mimes:pdf,doc,docx,pptx';
        }

        $rule['checkFileBookAttr'] = 'not_in:0';


        $validator = Validator::make($request->all(), $rule, [
            'checkFileBookAttr' => 'The language and type is required'
        ]);


        $idBook = $request->idBook;
        if ($validator->passes()) {


            $objFileBook = new Filebook();
            $objFileType = new Filetype();
            $objFileLang = new Filelang();

            for ($j = 0; $j < count($arrFile); $j++) {

                $pathTypeFileLang = $arrFile[$j]->store('public/book/typeFile');
                $objFileBook->addFileBook($idBook, $arrType[$j], $arrLang[$j], $pathTypeFileLang);
            }

            return response()->json(['success' => 1, 'fileBook' => $objFileBook->getAllType($idBook), 'fileType' => $objFileType->getAllType(), 'fileLang' => $objFileLang->getAllLang()]);
        }
        return response()->json(['error' => $validator->errors()->all()]);

    }

    public static function getAuthorBook($id)
    {
        $objAuthor = new Author();
        return $objAuthor->getAuthorBook($id);
    }

    public static function getKeywordBook($id)
    {
        $objKeyword = new Keyword();
        return $objKeyword->getKeywordBook($id);
    }

    public static function getOutlineBook($id)
    {
        $objOutline = new Outline();
        return $objOutline->getOutlineBook($id);
    }


    //////////////     End Admin      ///////////////////////////////////////////////////////////////////////////


    //////////////    library user        /////////////////////////

    public function ViewBookUser()
    {
        $paginateBook = $this->objBook->getPaginateBook();
        $getAllCat = $this->obj->getAllCategory();
        return view('mmpApp.library.library', ['paginateBook' => $paginateBook, 'getAllCat' => $getAllCat, 'cat' => 'all']);
    }

    public function ViewBookCatUser($cat_id)
    {
        $paginateBook = $this->objBook->getPaginateBookByCat($cat_id);
        $getAllCat = $this->obj->getAllCategory();
        return view('mmpApp.library.library', ['paginateBook' => $paginateBook, 'getAllCat' => $getAllCat, 'cat' => $cat_id]);
    }

    public function viewUniqueBook($id)
    {

        $getBook = $this->objBook->getBookData($id);
        $objAuthor = new Author();
        $objOutline = new Outline();
        $objKeyword = new Keyword();
        $getAllLang = $this->objFileLang->getAllLang();
        $getAllType = $this->objFiletype->getAllType();
        $objFileBook = new Filebook();

        $author = $objAuthor->getAuthorBook($id);
        $outline = $objOutline->getOutlineBook($id);
        $keyword = $objKeyword->getKeywordBook($id);
        $nameCat = $this->obj->getNameCatForBookId($getBook->cat_id);
        $getFileBookData = $objFileBook->getDataFileForBook($id);

        return view('mmpApp.library.libraryDetail', ['getBook' => $getBook , 'author' =>$author,'outline' =>$outline , 'keyword' => $keyword , 'nameCat' =>$nameCat , 'getAllLang' =>$getAllLang ,
            'getAllType' =>$getAllType , 'getFileBookData' =>$getFileBookData]);
    }

    public function resultSearch(Request $request) {

        //return $request->search;
        $keyword =  Input::get('search' , '');
        $resultBook = Book::SearchByKeyword($keyword)->get();
        $resultAuthor = Author::SearchByKeyword($keyword)->get();

        $result = $resultBook->union($resultAuthor);

       // $paginateBook = $this->objBook->getPaginateBook();
       // return view('mmpApp.library.resultSearch' , ['paginateBook' => $result]);
    }
    ///
}
