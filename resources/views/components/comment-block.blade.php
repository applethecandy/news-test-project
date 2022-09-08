<div class="w-full flex flex-col md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
    <div class="flex-1 flex flex-col">
        <p class="font-semibold text-2xl mb-4">Комментарии</p>

        @auth
            <div class="reply-block flex p-2 items-center hidden">
                <div class="reply-trash">
                    <i class="fas fa-trash mr-2 text-gray-400 hover:text-gray-500 cursor-pointer"></i>
                </div>
                <div class="reply-comment"></div>
            </div>
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                @method('PUT')
                <textarea class="comment" name="comment"></textarea>
                <input type="hidden" id="reply" name="reply">
                <input type="hidden" id="post" name="post" value="{{ $attributes->get('post') }}">
                <div class="flex justify-end mt-2">
                    <input class="border-2 border-gray-200 rounded-xl p-3 hover:bg-gray-100 cursor-pointer" type="submit"
                        value="Отправить">
                </div>
            </form>
        @else
            <div class="w-full flex flex-col md:text-left md:flex-row shadow bg-white p-6 justify-center">
                <p>
                    Вам необходимо
                    <a href="{{ route('login') }}" class="text-blue-800">войти</a>
                    или
                    <a href="{{ route('register') }}" class="text-blue-800">зарегистрироваться</a>,
                    чтобы иметь возможность оставлять комментарии
                </p>
            </div>
        @endauth

        @foreach ($comments->where('level', 0) as $comment)
            <x-comment :comment="$comment" class="mt-4" />
        @endforeach

        <script>
            tinymce.init({
                selector: 'textarea.comment',
                height: 200,
                branding: false,
                menubar: false,
                statusbar: false,
                contextmenu: false,
                toolbar: 'undo redo bold italic',
            });

            let reply_buttons = document.querySelectorAll('.reply-button');
            let reply_comment = document.querySelector('.reply-comment');
            let reply_trash = document.querySelector('.reply-trash');
            let reply_block = document.querySelector('.reply-block');

            reply_buttons.forEach(button => {
                button.addEventListener('click', e => {
                    reply_block.classList.remove('hidden');
                    let id = e.target.dataset.id;
                    let comment_text =
                        document.querySelector('.comment-text[data-id="' + id + '"]');
                    reply_comment.textContent = 'Ответ на комментарий: «' + comment_text.textContent + '»';
                    reply_block.scrollIntoView();
                    document.querySelector('#reply').value = id;
                });
            });

            document.querySelector('.reply-trash').addEventListener('click', e => {
                reply_block.classList.add('hidden');
                document.querySelector('#reply').value = null;
            })
        </script>

    </div>

</div>
