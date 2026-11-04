# ITRACKB4 LA12 — Movies

## H1. The error page named a vendor file. Where was your mistake actually?
The top of the error page showed a file inside the vendor folder because that
is where Laravel detected the call to the undefined method. My actual mistake
was in app/Http/Controllers/MovieController.php at line 26, which the
Exception trace showed by opening that frame automatically. The vendor file
was just where the failure surfaced, not where I wrote the wrong code.

## H2. What will your Log::info line tell you next month that the error page could not?
The log line records the id of every movie that was saved, with a timestamp.
Next month it can tell me exactly which records were created and in what order,
even after the page session is long gone. The error page only exists while the
request is active and disappears the moment you navigate away.

## H3. When is a 403 the better answer, and when is a redirect with a message better?
A 403 is the better answer when the action is fundamentally not allowed — like
trying to delete the last movie in a genre, which would leave orphaned data.
A redirect with a message is better when the refusal is something the user can
fix themselves, like submitting an incomplete form, because it keeps them in
the flow and tells them what to correct.