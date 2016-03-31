delete from news;
delete from topic;

insert into topic (id, name) values 
(1, 'Новости'),
(2, 'Наука'),
(3, 'Культура'),
(4, 'Происшествия');

insert into news (topic_id, name, publication_date, txt) values 
(1, 'Новость 1', '2016-03-12', 
'Kто-то, более предусмотрительный, чем все остальные, приказал закрыть
огромные речные ворота, расположенные там, где Анк вытекает из двойного
города. Река, лишенная свободы передвижения, вышла из берегов и разлилась по
терзаемым огнем улицам. Вскоре континент огня превратился в группу островов,
каждый из которых становился все меньше и меньше по мере того, как
поднимался темный прилив. А над затянутым дымом городом принялось расти,
закрывая собой звезды, бурлящее облако пара.'),
(1, 'Новость 2', '2015-11-30', 
'После обеда ходил в Горенду и застал папуасов за приготовлением
ужина. Туй чистил, сидя на столе, картофель, перед ним на костре стояли
обложенные камнями 2 горшка'),
(2, 'Научная новость 1', '2015-12-01', 
'Это самая главная научная новость'),
(2, 'О науке 2', '2007-03-02', 
'Тут написано всё что мы узнали о науке'),
(2, 'Про науку 3', '2007-06-21', 
'Действительно, философия, исчерпывающая смысл бытия, должна бы быть монистична.'),
(2, 'Что то научное 4', '2016-03-29', 
'Но если такова действительная природа бытия видимого и невидимого, 
то хотя, конечно, приходится с него сообразовываться, 
однако является естественный вопрос: нужно ли для чего-нибудь такое "Невидимое"'),
(3, 'Культурная новость', '2007-05-05', 
'Наплясавшись, они отправились домой, приглашая сейчас же следовать за ними в шлюпке. 
На выходе из тоннеля перед ними открылся ярко освещенный зал с высоким сводчатым потолком.'),
(3, 'Культурная новость 2', '2016-02-02', 
'В кинотеатре будет кино'),
(3, 'Хорошая новость', '2016-03-02', 
'В дверь ударили с такой сокрушительной силой, что она слетела с петель и с грохотом упала на пол.'),
(3, 'Так себе новость', '2007-03-20', 
'Наступил ноябрь, и сделалось очень холодно.'),
(3, 'Что то новое в культуре', '2016-03-11', 
'Приближалось Рождество.');

commit;
