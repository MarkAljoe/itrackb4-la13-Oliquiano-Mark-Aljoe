## ITRACKB4 LA11 — Movies
## G1. Route model binding needs two things. Name both.
Route model binding needs the model type, like Movie $movie, and the parameter name must match the route, like {movie}. If the names don't match, Laravel might not find the correct movie record. Without the type-hint, Laravel will only treat the value as a normal ID instead of automatically getting the record.

## G2. Why did the Delete link give a 404?
The Delete link gave a 404 because a normal link sends a GET request, while the delete route requires a DELETE request. Even though the URL was correct, Laravel couldn't find a matching route because the HTTP method was different.

## G3. What would break without old()'s second argument?
Without the second argument in old(), the edit form wouldn't show the movie's original values when opened for the first time. Also, if the form had an error after submitting, the user's previous inputs might be lost instead of being kept. The second argument makes sure the original values appear when there is no old input.