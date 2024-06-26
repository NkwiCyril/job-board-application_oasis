@extends('layout.app')

@section('title', 'Seeka | Create Opportunity')
@section('content')

<x-company_header></x-company_header>

<section class="bg-white">
  <div class="py-8 px-4 mx-auto max-w-xl lg:py-24 sm:py-24">
    <h2 class="mb-4 text-2xl font-bold text-gray-900">Create a New Opportunity</h2>

    <form action="{{route('opportunities.store')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
          <input type="text" name="title" id="title" value="{{old('title')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customColor focus:border-customColor block w-full p-2.5dark:placeholder-gray-400 dark: dark:focus:border-primary-500" placeholder="Opportunity Title" required>
        </div>

        @error('title')
        <em class=" text-sm text-danger">{{$message}}</em>
        @enderror

        <div>
          <div class="form-group items-center">
            <!-- <label for="bio" class="mb-2 text-sm font-medium text-gray-900 ">Oppportunity Image</label> -->
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                <img src="https://via.placeholder.com/150x150" alt="opportunity choosen image">
              </div>
              <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: fit-content; max-height: fit-content;"></div>
              <div class="mt-2">
                <span class="btn btn-outline-secondary btn-file hover:bg-customColor">
                  <span class="fileinput-new">Select Image</span>
                  <span class="fileinput-exists">Change</span>
                  <input type="file" name="image_url" accept="image/*" required>
                </span>
                @error('image_url')
                <em class=" text-sm text-danger">{{$message}}</em>
                @enderror
              </div>
            </div>
          </div>
        </div>

        <div>
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
          <select required id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customColor focus:border-customColor block w-full p-2.5 dark:focus:border-customColor">
            <option selected="">Select category</option>
            <option value="1">Job</option>
            <option value="2">Internship</option>
            <option value="3">Volunteerism</option>
          </select>
        </div>
        @error('category')
        <em class=" text-sm text-danger">{{$message}}</em>
        @enderror



        <div class="sm:col-span-2">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
          <textarea required id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customColor focus:border-customColor dark:placeholder-gray-400" placeholder="Opportunity description here">{{old('description')}}</textarea>
        </div>
        @error('description')
        <em class=" text-sm text-danger">{{$message}}</em>
        @enderror

      </div>
      <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 font-medium text-center text-white bg-customColor border-gray-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-customColorDark">
        Create
      </button>
    </form>

  </div>
</section>

@endsection