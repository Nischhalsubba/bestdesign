# CSS ownership

`legacy-theme.css` is the preserved compiled stylesheet from the original Best Design theme. The repository does not contain the Sass/source pipeline that produced it, so it is treated as a legacy generated artifact rather than hand-edited source.

WordPress loads the small root `style.css`, which carries the required theme metadata and imports this file. New styling work should either be made deliberately in a documented source pipeline or, if this legacy file must be edited directly, that ownership decision should be recorded here.
