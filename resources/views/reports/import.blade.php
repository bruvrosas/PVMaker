{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 24.05.2022
Description: Report imported form
--}}

{{-- Form inspired by: https://tailwindcomponents.com/component/input-field --}}
{{-- Tag select inspired by: https://codepen.io/oidre/pen/bGEbVXo --}}
{{-- Dynamic field inspired by: https://codepen.io/sanjayojha/pen/qBONdVm --}}
@extends('layouts/main')
@section('content')
<div class="relative inline-flex w-full min-h-screen h-full py-4 sm:pt-0">
    <div class="max-w-2xl mx-auto mt-32 p-16">
        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            {{--Title--}}
            <div class="mb-6">
                <label for="title" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Titre</label>
                <input value="{{$report->title}}" type="text" name="title" id="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            {{--Date--}}
            <div class="mb-6">
                <label for="date" class="block mb-2 text-base font-semibold font-medium text-gray-900 dark:text-gray-300">Date</label>
                <input value="{{$report->date->format('Y-m-d')}}" type="date" name="date" id="date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            {{--Time--}}
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="start_time" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Heure de début</label>
                    <input value="{{$report->start_time->format('H:i')}}" type="time" name="start_time" id="start_time" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                    <label for="end_time" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Heure de fin</label>
                    <input value="{{$report->end_time->format('H:i')}}" type="time" name="end_time" id="end_time" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
            </div>
            {{--Participants--}}
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
            {{--Absents--}}
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
            {{--Excused--}}
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
            {{--Agenda--}}
            <div class="mb-6 prose">
                <label for="agenda" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Ordre du jour et points traités</label>
                <textarea  name="agenda" id="report_editor" >{{$report->agenda}}</textarea>
            </div>
                @if (Route::has('login'))
                        @auth
                            {{--Tags--}}
                            <select x-cloak id="tags" class="hidden">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            {{--Import Tags Not working--}}{{--
                            <select x-cloak id="tags" class="hidden">
                                @foreach($tags as $tag)
                                    @foreach($report->tags as $reportTag)
                                        @if($tag === $reportTag)
                                            <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                        @else
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>--}}
                            <div class="mb-6 prose">
                                <label for="excused" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Tags</label>
                                <div x-data="tagDropdown()" x-init="loadOptions()" class="w-full flex flex-col">
                                  <input name="tags" type="hidden" x-bind:value="selectedValues()">
                                  <div class="inline-block relative">
                                    <div class="flex flex-col items-center relative">
                                      <div x-on:click="open" class="w-full">
                                        <div class="my-2 p-1 flex border border-gray-200 bg-white rounded">
                                          <div class="flex flex-auto flex-wrap">
                                            <template x-for="(option,index) in selected" :key="options[option].value">
                                              <div class="flex justify-center items-center m-1 font-medium py-1 px-1 bg-white rounded bg-gray-100 border">
                                                <div class="text-xs font-normal leading-none max-w-full flex-initial x-model=" options[option] x-text="options[option].text"></div>
                                                <div class="flex flex-auto flex-row-reverse">
                                                  <div x-on:click.stop="remove(index,option)" class="cursor-pointer">
                                                    <span class="iconify" data-icon="charm:cross" data-width="20" data-height="20"></span>
                                                  </div>
                                                </div>
                                              </div>
                                            </template>
                                            <div x-show="selected.length == 0" class="flex-1">
                                              <input placeholder="Sélectionnez un(des) tag(s)" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800" x-bind:value="selectedValues()">
                                            </div>
                                          </div>
                                          <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">

                                            <button type="button" x-show="isOpen() === true" x-on:click="open" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                              <span class="iconify" data-icon="ant-design:up-outlined" data-width="20" data-height="20"></span>
                                            </button>
                                            <button type="button" x-show="isOpen() === false" @click="close" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                              <span class="iconify" data-icon="ant-design:down-outlined" data-width="20" data-height="20"></span>
                                            </button>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="w-full px-4">
                                        <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select" x-on:click.away="close">
                                          <div class="flex flex-col w-full overflow-y-auto h-64">
                                            <template x-for="(option,index) in options" :key="option" class="overflow-auto">
                                              <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100" @click="select(index,$event)">
                                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                  <div class="w-full items-center flex justify-between">
                                                    <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                                    <div x-show="option.selected">
                                                      <span class="iconify" data-icon="charm:tick" data-width="20" data-height="20"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </template>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            {{--Folders--}}
                            <div class="mb-6 prose">
                                <label for="folder" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Dossier</label>
                                <select id="folders" name="folder_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($folders as $folder)
                                        @if($folder->id == $report->folder->id)
                                            <option value="{{$folder->id}}" selected>{{$folder->name}}</option>
                                        @else
                                        <option value="{{$folder->id}}">{{$folder->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="font-semibold bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Enregistrer PV</button>
                        @else
                            <button type="submit" class="font-semibold bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Télécharger PDF</button>
                        @endauth
                @endif
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>

    let participants = {!! json_encode(explode(';', $report->participants))  !!};
    console.log(participants);
    function participantsHandler() {
        return {
            fields: [],
            addNewField() {
                this.fields.push({
                participant: ''
                });
            },
            removeField(index) {
                this.fields.splice(index, 1);
            },
            importedParticipants(){
                participants.forEach(participant => this.fields.push({
                participant: participant
                }));
            }
        }
    }
    let participantsImporter = participantsHandler();
    participantsImporter.importedParticipants();

    function absentsHandler() {
        return {
            fields: [],
            addNewField() {
                this.fields.push({
                absent: ''
                });
            },
            removeField(index) {
                this.fields.splice(index, 1);
                }
        }
    }

    function excusedHandler() {
        return {
            fields: [],
            addNewField() {
                this.fields.push({
                excused: ''
                });
            },
            removeField(index) {
                this.fields.splice(index, 1);
                }
        }
    }

    function tagDropdown() {
                return {
                    options: [],
                    selected: [],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    canClick:true,
                    select(index, event) {
                        if (!this.canClick)
                        {
                            return;
                        }
                        if (!this.options[index].selected) {
                        console.log(index)
                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                        setTimeout(()=>{
                            this.canClick=true;
                            },100)
                    },
                    remove(index, option) {
                        if (!this.canClick)
                        {
                            return;
                        }
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);
                        setTimeout(()=>{
                            this.canClick=true;
                            },100)
                    },
                    loadOptions() {
                        const options = document.getElementById('tags').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }


                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }

   /* let reportDate = {!! json_encode($report->date)  !!};
    function setDate() {
      var date = document.querySelector('#date');
      var today = new Date();
      date.value = reportDate.toISOString().substring(0, 10);
    }
    setDate();*/

    let agenda = {!! json_encode($report->agenda)  !!};
    ClassicEditor
        .create( document.querySelector( '#report_editor' ), {
            removePlugins: ['Link', 'CKFinder','Image','ImageStyle', 'ImageCaption', 'ImageToolbar', 'ImageUpload' ,'BlockQuote','EasyImage','MediaEmbed'],
            toolbar: [ 'heading','|','bold', 'italic','|','bulletedList', 'numberedList','outdent','indent', '|','insertTable','|','undo','redo' ]
        })
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
