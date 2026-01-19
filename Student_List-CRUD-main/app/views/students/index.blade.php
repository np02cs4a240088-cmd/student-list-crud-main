@extends('layouts.master')

@section('title', 'Student List')

@section('content')
    <div class="btn-group">
        <a href="?page=create" class="btn btn-success">➕ Add New Student</a>
    </div>

    @if(count($students) > 0)
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8f9fa; border-bottom: 2px solid #667eea;">
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">ID</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">Name</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">Email</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">Course</th>
                    <th style="padding: 15px; text-align: center; font-weight: bold; color: #667eea;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 15px;">{{ $student['id'] }}</td>
                        <td style="padding: 15px;">{{ $student['name'] }}</td>
                        <td style="padding: 15px;">{{ $student['email'] }}</td>
                        <td style="padding: 15px;">{{ $student['course'] }}</td>
                        <td style="padding: 15px; text-align: center;">
                            <a href="?page=edit&id={{ $student['id'] }}" class="btn" style="padding: 8px 15px; font-size: 0.9em;">✏️ Edit</a>
                            <a href="?page=delete&id={{ $student['id'] }}" class="btn btn-danger" style="padding: 8px 15px; font-size: 0.9em;" onclick="return confirm('Are you sure?');">🗑️ Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            <strong>No students found.</strong> <a href="?page=create" style="color: inherit; text-decoration: underline;">Click here to add one</a>.
        </div>
    @endif
@endsection
