<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;
header("Access-Control-Allow-Origin', *");
header("Access-Control-Allow-Methods', GET,OPTIONS,PATCH,DELETE,POST,PUT");
class EstudanteController extends Controller
{
    protected $student;
    public function __construct(){
        $this->student = new Estudante();
         
    }
 
    public function index()
    {
        return $this->student->all();
    }
 
    public function store(Request $request)
    {
        return $this->student->create($request->all());
    }
 
    public function show(string $id)
    {
        $student = $this->student->find($id);  
    }
 
    public function update(Request $request, string $id)
    {
        $student = $this->student->find($id);
        $student->update($request->all());
        return $student;
    }
 
    public function destroy(string $id)
    {
        $student = $this->student->find($id);
        return $student->delete();
    }
}
