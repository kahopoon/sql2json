# sql2json
select data from sql, output as json

# usage
list.php?show=[Parameter 1]&id=[Parameter 2]  

[Parameter 1]:  
genre: - Return all available genre in [{id}, {name}]  
album: - Return album list of genre in [{id}, {name}, {artists}, {release_date}, {genre_id}]  
details: - Return album's song list with duration in [{song}, {duration}]  

[Parameter 2]:  
id of genre - Use with show=album  
id of album - Use with show=details  

#demo / example
Get list of all available genre. Return in [{id}, {name}].  
http://assignment.two.quite.cool/list.php?show=genre  

Get album list of genre 'POP' which has the id of '10'. Return in [{id}, {name}, {artists}, {release_date}, {genre_id}]  
http://assignment.two.quite.cool/list.php?show=album&id=10  

Get album 'Yes!' by Jason Mraz's song list with duration. 'Yes!' has the id of '5'. Return in [{song}, {duration}]  
http://assignment.two.quite.cool/list.php?show=details&id=5  

