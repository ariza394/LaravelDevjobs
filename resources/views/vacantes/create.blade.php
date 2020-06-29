@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha256-R45gjjgTM82XinRpA4xKOL00zJ2/ajOSjY3tvw5JaDM=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.css" integrity="sha256-iDg4SF4hvBdxAAFXfdNrl3nbKuyVBU3tug+sFi1nth8=" crossorigin="anonymous" />
    
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">New Vacant</h1>

    <form 
        action="{{route('vacantes.store')}}" 
        class="max-w-lg mx-auto my-10"
        method="POST"
    >
        @csrf
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Title:</label>
            <input 
                id="titulo" 
                type="text" 
                class="p-3 bg-gray-100 rounded form-input w-full 
                @error('titulo') border-red-500 border @enderror" 
                name="titulo"
                placeholder="Title"
                value="{{old('titulo')}}"
            >
            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        {{--Categorias--}}
        <div class="mb-5">
            <label 
                for="categoria" 
                class="block text-gray-700 text-sm mb-2"
            >Category:</label>

            <select 
                id="categoria"
                class="block appearance-none w-full border border-gray-200 
                    text-gray-700 rounded leading-tight focus:outline-none 
                    focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full
                    @error('categoria') border-red-500 border @enderror"
                name="categoria"
            
            >
                <option disabled selected>--Choose One--</option>
                @foreach($categorias as $categoria)
                    <option 
                        {{old('categoria') == $categoria->id ? 'selected' : '' }}
                        value="{{$categoria->id}}"
                    >
                        {{$categoria->nombre}}
                    </option>
                @endforeach
            </select>
            @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        {{--Experiencias--}}
        <div class="mb-5">
            <label 
                for="experiencia" 
                class="block text-gray-700 text-sm mb-2"
            >Experience:</label>

            <select 
                id="experiencia"
                class="block appearance-none w-full border border-gray-200 
                    text-gray-700 rounded leading-tight focus:outline-none 
                    focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full
                    @error('experiencia') border-red-500 border @enderror"
                name="experiencia"
            
            >
                <option disabled selected>--Choose One--</option>
                @foreach($experiencias as $experiencia)
                    <option
                        {{old('experiencia') == $experiencia->id ? 'selected' : '' }}
                        value="{{$experiencia->id}}"
                    >
                        {{$experiencia->nombre}}
                    </option>
                @endforeach
            </select>
            @error('experiencia')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        {{--Ubicacion--}}
        <div class="mb-5">
            <label 
                for="ubicacion" 
                class="block text-gray-700 text-sm mb-2"
            >Location:</label>

            <select 
                id="ubicacion"
                class="block appearance-none w-full border border-gray-200 
                    text-gray-700 rounded leading-tight focus:outline-none 
                    focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full
                    @error('ubicacion') border-red-500 border @enderror"
                name="ubicacion"
            
            >
                <option disabled selected>--Choose One--</option>
                @foreach($ubicaciones as $ubicacion)
                    <option 
                        {{old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
                        value="{{$ubicacion->id}}"
                    >
                        {{$ubicacion->nombre}}
                    </option>
                @endforeach
            </select>
            @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        {{--Salarios--}}
        <div class="mb-5">
            <label 
                for="salario" 
                class="block text-gray-700 text-sm mb-2"
            >Salary:</label>

            <select 
                id="salario"
                class="block appearance-none w-full border border-gray-200 
                    text-gray-700 rounded leading-tight focus:outline-none 
                    focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full
                    @error('salario') border-red-500 border @enderror"
                name="salario"
            
            >
                <option disabled selected>--Choose One--</option>
                @foreach($salarios as $salario)
                    <option
                        {{old('salario') == $salario->id ? 'selected' : '' }} 
                        value="{{$salario->id}}"
                    >
                        {{$salario->nombre}}
                    </option>
                @endforeach
            </select>
            @error('salario')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        {{--Editor--}}
        <div class="mb-5">
            <label 
                for="descripcion" 
                class="block text-gray-700 text-sm mb-2"
            >Description:</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        {{--Dropzone img--}}
        <div class="mb-5">
            <label 
                for="imagen" 
                class="block text-gray-700 text-sm mb-2"
            >Vacant Image:</label>
            <!--<div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>-->
            <input disabled type="hidden" name="imagen" id="imagen" value="{{old('imagen')}}">
            <h6>image feature is disable by costs</h6>
            <p id="error"></p>
            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        {{--skills--}}
        <div class="mb-5">
            <label 
                for="skills" 
                class="block text-gray-700 text-sm mb-2"
            >Skills:</label>
            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp
            <lista-skills
                :skills="{{json_encode($skills)}}"
                :oldskills="{{json_encode(old('skills'))}}"
            ></lista-skills>
            @error('skills')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <button
            type="submit"
            class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >Public Vacant</button>

    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha256-R0a97wz9RimQA9BJEMqcwuOckEMhIQcdtij32P5WpuI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.js" integrity="sha256-fegGeSK7Ez4lvniVEiz1nKMx9pYtlLwPNRPf6uc8d+8=" crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () =>{
            //editor
            const editor = new MediumEditor('.editable',{
                toolbar:{
                    button:['bold','italic','underline','quote','anchor','justifyLeft','justifyCenter','justifyRight','justifyFull','h2','h3'],
                    static:true,
                    sticky:true
                },
                placeholder:{
                    text:'Vacant Description'
                }
            });

            //agrega al input hidden
            editor.subscribe('editableInput',function(eventObj,editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            //llena el editor con el old
            editor.setContent(document.querySelector('#descripcion').value);

            //dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs',{
                url:"/vacantes/imagen",
                dictDefaultMessage:"Upload your file",
                acceptedFiles:".png,.jpg,.jpeg,.gif",
                addRemoveLinks:true,
                maxFiles:1,
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init:function(){
                    if(document.querySelector('#imagen').value.trim()){
                        let imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = document.querySelector('#imagen').value;

                        this.options.addedfile.call(this,imagenPublicada);
                        this.options.thumbnail.call(this,imagenPublicada,`/storage/vacantes/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-sucess');
                        imagenPublicada.previewElement.classList.add('dz-complete');
                    }
                },
                success:function(file,response){
                    console.log(response);
                    //elimina error
                    document.querySelector('#error').textContent = "";
                    //adquiere el nombre de la imagen
                    document.querySelector('#imagen').value = response.correcto;

                    file.nombreServidor = response.correcto;
                },
                maxfilesexceeded:function(file){
                    if(this.files[1] != null){
                        this.removeFile(this.files[0]);
                        this.addFile(file); //Agrega el ultimo
                    }
                },
                removedfile:function(file,response){
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    params = {
                        imagen:file.nombreServidor ?? document.querySelector('#imagen').value
                    }
                    axios.post('/vacantes/borrarimagen',params)
                        .then(respuesta => console.log(respuesta))
                }
            });
        })
    </script>
@endsection