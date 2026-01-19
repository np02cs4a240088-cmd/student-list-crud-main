@extends('layouts.master')

@section('title', 'Edit Student')

@section('content')
    <h2 style="color: #667eea; margin-bottom: 20px;">✏️ Edit Student</h2>

    @if($student)
        <form method="POST" action="?page=update&id={{ $student['id'] }}" style="max-width: 600px;">
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Student Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ $student['name'] }}"
                    required 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;"
                    placeholder="Enter student name"
                >
            </div>

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ $student['email'] }}"
                    required 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;"
                    placeholder="Enter email address"
                >
            </div>

            <div style="margin-bottom: 20px;">
                <label for="course" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Course</label>
                <input 
                    type="text" 
                    id="course" 
                    name="course" 
                    value="{{ $student['course'] }}"
                    required 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;"
                    placeholder="Enter course name"
                >
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-success" style="flex: 1;">💾 Update Student</button>
                <a href="?page=index" class="btn btn-secondary" style="flex: 1; text-align: center;">❌ Cancel</a>
            </div>
        </form>
    @else
        <div class="alert alert-error">
            <strong>Error:</strong> Student not found.
        </div>
        <a href="?page=index" class="btn btn-secondary">← Back to List</a>
    @endif
@endsection
