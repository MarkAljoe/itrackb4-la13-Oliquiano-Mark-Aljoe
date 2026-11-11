# ITRACKB4 LA13 — Movies

## J1. Name two things an index() on a resource controller does that yours does not have to.
A resource controller's index() is expected to list all records of a specific
model and pass them to a list view. My HomeController's index() does not list
any records in a table — it only passes two counts and returns a welcome view.
It also does not need to handle query filters, pagination, or sorting, because
its only job is to display the front page.

## J2. What did the pagination links contain before withQueryString(), and what did the controller receive?
Before withQueryString(), the pagination links only contained the page number
in the URL, like ?page=2. When the controller received that request, it had no
search term, no genre filter, and no sort value — so it ran the query without
any of those conditions and returned the full unfiltered list, making the search
appear to reset on page 2.

## J3. Why is a silent wrong sort worse than an error, and what does the allowed list do?
A misspelled sort value like ?sort=invalidcolumn does not crash the page on
SQLite — it simply returns the results in no particular order, with no message
to tell the user or developer that anything went wrong. This is worse than an
error because nobody reports it and it is impossible to debug. The allowed list
checks the value against ['title', 'release_year'] and falls back to 'title'
if anything else is passed, so the page always behaves predictably.