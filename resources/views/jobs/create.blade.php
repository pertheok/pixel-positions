<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" />
        <x-forms.input label="Salary" name="salary" />
        <x-forms.input label="Location" name="location" />

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://www.twitch.tv/masondota2" />

        <x-forms.input label="Tags (Comma separated)" name="tags" placeholder="portfolio, video, education" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>