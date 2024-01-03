<div class="my-10">
    <p>パスワードの変更が完了しました。</p>
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit">TOPページに戻る</button>
    </form>
</div>

