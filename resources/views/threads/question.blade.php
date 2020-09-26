{{-- Editing the question. --}}

<div class="card" v-if="editing">
    <div class="card-header">
        <div class="level">
            <input type="text" class="form-control" v-model="form.title">
        </div>
    </div>
    
    <div class="card-body">
        <div class="form-group">
            <!-- <textarea class="form-control" rows="10" v-model="form.body"></textarea> -->
            <wysiwyg v-model="form.body"></wysiwyg>
        </div>
    </div>
    
    <div class="card-footer">
        <div class="level">
            <button class="btn btn-xs level-item" @click="editing = true" v-show="! editing">Edit</button>
            <button class="btn btn-info btn-xs level-item" @click="update">Update</button>
            <button class="btn btn-xs level-item" @click="resetForm">Cancel</button>

            @can ('update', $thread)
                <form action="{{ $thread->path() }}" method="POST" class="ml-a">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-link">Delete Thread</button>
                </form>
            @endcan

        </div>
    </div>
</div>

{{-- Viewing the question. --}}

<div class="card mb-3" v-else>
    <div class="card-header">
        <div class="level">
            <img src="{{ $thread->creator->avatar_path }}"
                     alt="{{ $thread->creator->name }}"
                     width="25"
                     height="25"
                     class="mr-1">
            <span class="flex">
                <a href="/profiles/{{ $thread->creator->name }}"> {{ $thread->creator->name }} </a> објави: {{ $thread->title}}
            </span>
            
            <div v-if="authorize('owns', thread)">
                <button class="btn btn-xs mr-1" @click="editing = true"><span><i class="fas fa-code"></i></span></button>
            </div> 

        </div>
    </div>

    <!-- <div class="card-body" v-text="body"></div> -->
    <div class="card-body" v-html="body"></div>

<!--     <div class="card-footer" v-if="authorize('owns', thread)">
        <button class="btn btn-info btn-xs" @click="editing = true">Edit</button>
    </div> -->
</div> 