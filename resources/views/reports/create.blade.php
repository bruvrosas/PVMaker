{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 24.05.2022
Description: Report creation folder
--}}

{{-- Inspired by: https://tailwindcomponents.com/component/input-field --}}
@extends('layouts/main')
@section('content')
<div class="relative inline-flex w-full min-h-screen h-full py-4 sm:pt-0">
    <div class="max-w-2xl mx-auto mt-32 p-16">
        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Titre</label>
                <input type="text" name="title" id="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="date" class="block mb-2 text-base font-semibold font-medium text-gray-900 dark:text-gray-300">Date</label>
                <input type="date" name="date" id="date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="start_time" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Heure de début</label>
                    <input type="time" name="start_time" id="start_time" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                    <label for="end_time" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Heure de fin</label>
                    <input type="time" name="end_time" id="end_time" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
            </div>
            <div x-data="participantsHandler()">
                <table class="align-items-center mb-4">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Présents</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(field, index) in fields" :key="index">
                            <tr>
                            <td x-text="index + 1"></td>
                            <td><input x-model="field.participant" type="text" name="participants[]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" ></td>
                            <td><button type="button" @click.prevent="removeField(index)" class="block ml-2 mb-2 text-xs font-medium text-red-600 dark:text-red-300">Supprimer</button></td>
                            </tr>
                        </template>
                    </tbody>
                    <tfoot>
                        <tr>
                        <td colspan="3" class="text-center text-xs font-medium text-blue-600 dark:text-blue-300"><button type="button" @click.prevent="addNewField()">+ Ajouter un participant</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div x-data="absentsHandler()">
                <table class="align-items-center mb-4">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Absents</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(field, index) in fields" :key="index">
                            <tr>
                            <td x-text="index + 1"></td>
                            <td><input x-model="field.absent" type="text" name="absents[]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" ></td>
                            <td><button type="button" @click.prevent="removeField(index)" class="block ml-2 mb-2 text-xs font-medium text-red-600 dark:text-red-300">Supprimer</button></td>
                            </tr>
                        </template>
                    </tbody>
                    <tfoot>
                        <tr>
                        <td colspan="3" class="text-center text-xs font-medium text-blue-600 dark:text-blue-300"><button type="button" @click.prevent="addNewField()">+ Ajouter un absent</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div x-data="excusedHandler()">
                <table class="align-items-center mb-4">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Excusés</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(field, index) in fields" :key="index">
                            <tr>
                            <td x-text="index + 1"></td>
                            <td><input x-model="field.excused" type="text" name="excused[]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" ></td>
                            <td><button type="button" @click.prevent="removeField(index)" class="block ml-2 mb-2 text-xs font-medium text-red-600 dark:text-red-300">Supprimer</button></td>
                            </tr>
                        </template>
                    </tbody>
                    <tfoot>
                        <tr>
                        <td colspan="3" class="text-xs font-medium text-blue-600 dark:text-blue-300"><button type="button" @click.prevent="addNewField()">+ Ajouter un excusé</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="mb-6 prose">
                <label for="excused" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Ordre du jour et points traités</label>
                <textarea  name="agenda" id="report_editor" ></textarea>
                {{--<input type="textarea" name="agenda" id="report_editor" class="">--}}
            </div>
            <div>
                @if (Route::has('login'))
                        @auth
                            <button type="submit" class="font-semibold bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Enregistrer PV</button>
                        @else
                            <button type="submit" class="font-semibold bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Télécharger PDF</button>
                        @endauth
                @endif
            </div>
        </form>
    </div>
</div>

{{-- <script src="node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<script>
    function participantsHandler() {
        return {
            fields: [],
            canAdd:true,
            canDelete:true,
            addNewField() {
                if (!this.canAdd)
                {
                    return;
                }
                this.canAdd = false;
                setTimeout(()=>{
                    this.canAdd=true;
                    },100)
                this.fields.push({
                participant: ''
                });
            },
            removeField(index) {
                // M.Hayoz
                if (!this.canDelete)
                {
                    return;
                }
                this.canDelete = false;
                setTimeout(()=>{
                    this.canDelete=true;
                    },100)
                this.fields.splice(index, 1);
                }
        }
    }
    function absentsHandler() {
        return {
            fields: [],
            canAdd:true,
            canDelete:true,
            addNewField() {
                if (!this.canAdd)
                {
                    return;
                }
                this.canAdd = false;
                setTimeout(()=>{
                    this.canAdd=true;
                    },100)
                this.fields.push({
                absent: ''
                });
            },
            removeField(index) {
                // M.Hayoz
                if (!this.canDelete)
                {
                    return;
                }
                this.canDelete = false;
                setTimeout(()=>{
                    this.canDelete=true;
                    },100)
                this.fields.splice(index, 1);
                }
        }
    }

    function excusedHandler() {
        return {
            fields: [],
            canAdd:true,
            canDelete:true,
            addNewField() {
                if (!this.canAdd)
                {
                    return;
                }
                this.canAdd = false;
                setTimeout(()=>{
                    this.canAdd=true;
                    },100)
                this.fields.push({
                excused: ''
                });
            },
            removeField(index) {
                // M.Hayoz
                if (!this.canDelete)
                {
                    return;
                }
                this.canDelete = false;
                setTimeout(()=>{
                    this.canDelete=true;
                    },100)
                this.fields.splice(index, 1);
                }
        }
    }

    function today() {
      var date = document.querySelector('#date');
      var today = new Date();
      date.value = today.toISOString().substring(0, 10);
    }
    today();

    ClassicEditor
        .create( document.querySelector( '#report_editor' ), {
            removePlugins: ['Link', 'CKFinder','Image','ImageStyle', 'ImageCaption', 'ImageToolbar', 'ImageUpload' ,'BlockQuote','EasyImage','MediaEmbed'],
            toolbar: [ 'heading','|','bold', 'italic','|','bulletedList', 'numberedList','outdent','indent', '|','insertTable','|','undo','redo' ]
        } )
        .catch( error => {
            console.error( error );
        } );
        //console.log(ClassicEditor.builtinPlugins.map( plugin => plugin.pluginName ));
</script>

@endsection
